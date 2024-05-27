<?php

namespace App\Http\Controllers;

use App\Models\BimbinganMagang;
use App\Models\Magang;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class JadwalBimbinganController extends Controller
{
    public function index(Request $request)
    {
        $email = Auth::user()->email;
        $data = BimbinganMagang::all();
        $magang = Magang::BimbinganMHS();
        // return view('jadwalbimbingan.jadwalbimbingan', ['bimbingan_magangs' => $data]);
        return view(
            'jadwalbimbingan.jadwalbimbingan',
            ['name' => 'Bimbingan Magang'],
            compact('data', 'magang')
        );
    }
    public function create()
    {
        return view('jadwalbimbingan.create');
    }
    //method untuk tambah data buku
    public function store(Request $request)
    {
        // Validasi data dari form
        $this->validate($request, [
            'tgl_kegiatan' => 'required',
            'kegiatan' => 'required',
        ]);

        // Mengambil magang_id dari session
        $magang_id = session('magang_id');

        // Simpan data ke database
        DB::table('bimbingan_magangs')->insert(
            [
                'magang_id' => $magang_id,
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'kegiatan' => $request->kegiatan,
                'status_kehadiran' => '0'
            ]
        );

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('jadwal-bimbingan-magang.index')->with('success', 'Data berhasil disimpan.');
    }

    // Fungsi lainnya bisa ditambahkan sesuai kebutuhan
}
