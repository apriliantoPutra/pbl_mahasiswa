<?php

namespace App\Http\Controllers;

use App\Models\industri;
use App\Models\Magang;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\pendaftaran_magang;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {

        $industriid = industri::where("industri_id", $request->industri_id)->first();
        $data = pendaftaran_magang::all();
        $dataindustri = industri::all();

        $mhs = Magang::BimbinganByMagang();

        if (isset($mhs->magang_id)) {
            toastr()->warning('Anda Sudah Daftar');
            $datamhs = Magang::datamhs($mhs);
            $datadosen = Magang::datadosen();
            // dd($datadosen);
            return view('pendaftaran.data', compact('data', 'datamhs','datadosen'));
        }
        else {
            return view('pendaftaran.daftar', compact('data', 'dataindustri', 'industriid'));
        }
    }

    public function store(Request $request)
    {
        $nim = Magang::Mhsmagang()->mhs_nim;

        $magang_id = DB::table('magangs')->insertGetId(
            ['mhs_nim' => $nim]
        );

        DB::table('magang_industris')->insert(
            [
                'magang_id' => $magang_id,
                'industri_id' => $request->nama_industri,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
            ],
        );
        return redirect()->route('daftar-magang.index')->with('success', 'Data berhasil disimpan.');
    }
    public function show($magang_id)
    {
        $menus = Menu::all();
        $data = Magang::datamhs($magang_id);
        return view('pendaftaran.data', compact('menus', 'data'));
    }
}
