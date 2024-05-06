<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\pendaftaran_magang;

class PendaftaranController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pendaftaran.daftar', compact('menus'));
    }

    public function dataindustri()
    {
        $data = pendaftaran_magang::PendaftaranByMagang();
        return view('pendaftaran.dataindustri', compact('data'));
    }

    public function upload()
    {
        return view('pendaftaran.upload');
    }
}
