<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\logbook_magang;

class logbookController extends Controller
{
    public function index()
    {
        // $data = logbook_magang::all();
        $data = logbook_magang::LogbookByMagang();

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
        ]);

        // Mengambil magang_id dari session
        $magang_id = session('magang_id');

        // Simpan data ke database
        $data = new logbook_magang();
        $data->tgl_kegiatan = $request->tgl_kegiatan;
        $data->kegiatan = $request->kegiatan;
        $data->jam = $request->jam;
        $data->magang_id = $magang_id; // Menggunakan magang_id dari session
        $data->save();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('logbook-magang.index')->with('success', 'Data berhasil disimpan.');
    }

    //mengambil show
    public function show($logbook_id)
    {
        $logbook_magang = logbook_magang::find($logbook_id);
        return view('logbook.show', compact('logbook_magang'));
    }
}
