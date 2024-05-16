<?php

namespace App\Http\Controllers;

use App\Models\industri;
use App\Models\Magang;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\pendaftaran_magang;


class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $industriid = industri::where("industri_id", $request->industri_id)->first();
        $data = pendaftaran_magang::PendaftaranByMagang();
        return view('pendaftaran.daftar', compact('data', 'industriid'));
    }

    public function store(Request $request)
    {
        $nim = Magang::BimbinganByMagang()[0]->mhs_nim;

        // Validasi data formulir
        // v$request->validate([
        //     'industri_id' => 'required',
        //     'tgl_mulai' => 'required|date',
        //     'tgl_selesai' => 'required|date|after:tgl_mulai',
        // ]);

        // $magangIndustri = new pendaftaran_magang();
        // $magangIndustri->tgl_mulai = $request->tgl_mulai;
        // $magangIndustri->tgl_selesai = $request->tgl_selesai;
        // $magangIndustri->save();

        $daftar = new Magang();
        $daftar->mhs_nim = $nim;
        $daftar->save();
    }
}
