<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Laporan_magang;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Laporan_magang::TambahDokumen();
        $coba = laporan_magang::gabungkan_laporan_dan_proposal();
        return view('laporanmagang.index', compact('data', 'coba'));
    }
    public function create(): View
    {
        return view('laporanmagang.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'magang_judul' => 'required',
            'file_magang' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        $file_magang = $request->file('file_magang');
        // $nama_dokumen = $file_magang->getClientOriginalName();
        $nama_dokumen = 'FT' . date('Ymdhis') . '.' . $request->file('file_magang')->getClientOriginalExtension();
        $file_magang->move('storage', $nama_dokumen);

        $magang_id = session('magang_id');



        DB::table('laporan_magangs')->insert(
            [
                'magang_id' => $magang_id,
                'magang_judul' => $request->magang_judul,
                'file_magang' => $nama_dokumen,
                'tipe' => $request->jenis_dokumen,
            ],
        );

        return redirect('laporanmagang')->with('success', 'Data berhasil disimpan.');
    }


    public function edit(string $laporan_id): View
    {
        $data = Laporan_magang::find($laporan_id);
        return view('laporanmagang.edit')->with('laporanmagang', $data);
    }

    public function update(Request $request, string $laporan_id): RedirectResponse
    {
        $this->validate($request, [
            'magang_judul' => 'required',
            'file_magang' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        $dataToUpdate = [
            'magang_judul' => $request->magang_judul,
            'tipe' => $request->jenis_dokumen,
        ];

        // Handle file upload
        if ($request->hasFile('file_magang')) {
            $file_magang = $request->file('file_magang');
            $nama_dokumen = 'FT' . date('Ymdhis') . '.' . $file_magang->getClientOriginalExtension();
            $file_magang->move('storage', $nama_dokumen);
            $dataToUpdate['file_magang'] = $nama_dokumen;
        }

        DB::table('laporan_magangs')
            ->where('laporan_id', $laporan_id)
            ->update($dataToUpdate);

        return redirect('laporanmagang')->with('flash_message', 'Laporan magang updated!');
    }

    public function destroy(string $laporan_id): RedirectResponse
    {
        Laporan_magang::destroy($laporan_id);
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
    
}
