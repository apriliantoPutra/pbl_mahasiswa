<?php

namespace App\Http\Controllers;

use App\Models\BimbinganMagang;
use App\Models\Magang;
use Illuminate\Http\Request;
use App\Models\Menu;

class JadwalBimbinganController extends Controller
{
    public function index()
    {
        $data = BimbinganMagang::all();
        $magang = Magang::Magang();
        // return view('jadwalbimbingan.jadwalbimbingan', ['bimbingan_magangs' => $data]);
        return view(
            'jadwalbimbingan.jadwalbimbingan',
            ['name' => 'Jadwal Bimbingan'],
            compact('data', 'magang')
        );
    }

    // Fungsi lainnya bisa ditambahkan sesuai kebutuhan
}
