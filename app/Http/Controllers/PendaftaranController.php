<?php

namespace App\Http\Controllers;

use App\Models\industri;
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

    public function dataindustri(Request $request)
    {
        $industriid = industri::where("industri_id", $request->industri_id)->first();
        $data = pendaftaran_magang::PendaftaranByMagang();
        return view('pendaftaran.dataindustri', compact('data', 'industriid'));
    }

    public function upload()
    {
        return view('pendaftaran.upload');
    }

    public function store(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'industri_id' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
        ]);

        $magangIndustri = new pendaftaran_magang();
        $magangIndustri->tgl_mulai = $request->tgl_mulai;
        $magangIndustri->tgl_selesai = $request->tgl_selesai;
        $magangIndustri->save();
    }
}
