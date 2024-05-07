<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pendaftaran_magang extends Model
{
    use HasFactory;
    protected $table = 'magang_industris';
    public static function PendaftaranByMagang()
    {
        // // Mendapatkan email pengguna yang sedang terautentikasi
        // $email = Auth::user()->email;

        // // Mendapatkan magang_id dari tabel magangs berdasarkan email pengguna
        // $magang_id = DB::table('magangs')
        //     ->join('mahasiswas', 'magangs.mhs_nim', '=', 'mahasiswas.mhs_nim')
        //     ->join('users', 'mahasiswas.email', '=', 'users.email')
        //     ->where('users.email', $email)
        //     ->value('magangs.magang_id');

        // // Simpan magang_id ke dalam session
        // session(['magang_id' => $magang_id]);

        // // Mengambil data logbook_magangs berdasarkan magang_id dari session

         $pendaftaranMagangs = DB::table('magang_industris')
        ->join('industris', 'industris.industri_id', '=', 'magang_industris.industri_id')
        ->join('magangs', 'magangs.magang_id', '=', 'magang_industris.magang_id')
        ->select('magangs.magang_id', 'magang_industris.*', 'industris.*')
        ->get();


        return $pendaftaranMagangs;
    }
}
