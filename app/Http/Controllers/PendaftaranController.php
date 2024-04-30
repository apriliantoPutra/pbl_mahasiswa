<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class PendaftaranController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pendaftaran.daftar', compact('menus'));
    }

    // Fungsi lainnya bisa ditambahkan sesuai kebutuhan
    public function biodata()
    {
        return view('pendaftaran.biodata');
    }

    public function dataindustri()
    {
        return view('pendaftaran.dataindustri');
    }

    public function upload()
    {
        return view('pendaftaran.upload');
    }
}
?>