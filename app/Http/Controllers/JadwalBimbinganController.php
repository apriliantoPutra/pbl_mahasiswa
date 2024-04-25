<?php

namespace App\Http\Controllers;

use App\Models\BimbinganMagang;
use App\Models\Magang;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Session;

class JadwalBimbinganController extends Controller
{
    public function index(Request $request)
    {
        $email = Auth::user()->email;
        $data = BimbinganMagang::all();
        $magang = Magang::BimbinganByMagang();
        // return view('jadwalbimbingan.jadwalbimbingan', ['bimbingan_magangs' => $data]);
        return view(
            'jadwalbimbingan.jadwalbimbingan',
            ['name' => 'Bimbingan Magang'],
            compact('data', 'magang')
        );
    }

    // Fungsi lainnya bisa ditambahkan sesuai kebutuhan
}
