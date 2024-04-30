<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\logbook_magang;

class logbookController extends Controller
{
    public function index()
    {
        $data = logbook_magang::all();
        return view('logbook.log', ['name' => 'Logbook', 'logbook_magangs' => $data]);
    }
    public function create()
    {
        return view('logbook.create');
    }
    //method untuk tambah data buku
    public function store(Request $request)
    {
        // Validasi data dari form
        $this->validate($request, [
            'tgl_kegiatan' => 'required',
            'kegiatan' => 'required',
            'jam' => 'required',
            'bukti' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);

        // Menghitung jumlah entri logbook_magang
        $count = logbook_magang::count();

        // Mendapatkan nilai untuk logbook_id dan magang_id
        $logbook_id = $count + 1; // Untuk logbook_id
        $magang_id = $count + 1; // Untuk magang_id

        // Upload file
        $file_dokumen = $request->file('bukti');
        $nama_dokumen = $request->file('bukti')->getClientOriginalName();
        $file_dokumen->move('assets/dokumen/', $nama_dokumen);


        // Simpan data ke database
        $data = new logbook_magang();
        $data->tgl_kegiatan = $request->tgl_kegiatan;
        $data->kegiatan = $request->kegiatan;
        $data->jam = $request->jam;
        $data->bukti = $nama_dokumen; // Menggunakan 'bukti' bukan '$file_dokumen'
        $data->logbook_id = $logbook_id;
        $data->magang_id = $magang_id;
        $data->save();


        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('logbook-magang.index')->with('success', 'Data berhasil disimpan.');
    }

    //method untuk hapus data
    public function destroy($logbook_id)
    {
        $data = logbook_magang::find($logbook_id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    //method untuk form edit
    public function edit($logbook_id)
    {
        // Mengambil data logbook_magang berdasarkan logbook_id
        $logbook_magang = logbook_magang::find($logbook_id);

        // Mengirimkan data logbook_magang ke view untuk ditampilkan di dalam form
        return view('logbook.edit', compact('logbook_magang'));
    }

    //method untuk update
    public function update($logbook_id, Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'tgl_kegiatan' => 'required',
            'kegiatan' => 'required',
            'jam' => 'required',
            'bukti' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);

        // Mengambil data logbook_magang berdasarkan logbook_id
        $logbook_magang = logbook_magang::find($logbook_id);

        // Upload file jika ada perubahan
        if ($request->hasFile('bukti')) {
            $file_dokumen = $request->file('bukti');
            $nama_dokumen = $file_dokumen->getClientOriginalName();
            $file_dokumen->move('assets/dokumen/', $nama_dokumen);

            // Mengupdate nama file bukti
            $logbook_magang->bukti = $nama_dokumen;
        }

        // Mengupdate data logbook_magang
        $logbook_magang->tgl_kegiatan = $request->tgl_kegiatan;
        $logbook_magang->kegiatan = $request->kegiatan;
        $logbook_magang->jam = $request->jam;
        $logbook_magang->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('logbook-magang.index')->with('success', 'Data berhasil disimpan.');
    }
}
