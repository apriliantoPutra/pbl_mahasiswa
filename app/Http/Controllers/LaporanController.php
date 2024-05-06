<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Laporan_magang;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Laporan_magang::all();
        return view('laporanmagang.index')->with('laporanmagang', $data);
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
        $nama_dokumen = $file_magang->getClientOriginalName();
        $file_magang->move('storage', $nama_dokumen);

        $magang_id = session('magang_id');

        $data = new Laporan_magang();
        $data->magang_id = $request->magang_id;
        $data->magang_judul = $request->magang_judul;
        $data->file_magang = $nama_dokumen;
        $data->save();

        return redirect('laporanmagang')->with('success', 'Data berhasil disimpan.');
    }

    public function show(string $laporan_id): View
    {
        $data = Laporan_magang::find($laporan_id);
        return view('laporanmagang.show')->with('laporanmagang', $data);
    }
    public function edit(string $laporan_id): View
    {
        $data = Laporan_magang::find($laporan_id);
        return view('laporanmagang.edit')->with('laporanmagang', $data);
    }
    public function update(Request $request, string $laporan_id): RedirectResponse
    {
        $data = Laporan_magang::find($laporan_id);
        $input = $request->all();
        $data->update($input);
        return redirect('laporanmagang')->with('flash_message', 'student Updated!');
    }

    public function destroy(string $laporan_id): RedirectResponse
    {
        Laporan_magang::destroy($laporan_id);
        return redirect('laporanmagang')->with('error', 'Data berhasil dihapus.');
    }
}
