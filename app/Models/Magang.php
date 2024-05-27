<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class Magang extends Model
{
    use HasFactory;
    protected $table = "magangs";
    protected $primarykey = 'magang_id';
    protected $fillable = ['mhs_nim', 'dosen_nip'];
    public $timestamps = false;

    public static function Magang()
    {
        $magang = DB::table('magangs')
            ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
            ->join('dosens', 'dosens.dosen_nip', '=', 'magangs.dosen_nip')
            ->join('bimbingan_magangs', 'bimbingan_magangs.magang_id', '=', 'magangs.magang_id')
            ->select('mahasiswas.*', 'dosens.*', 'bimbingan_magangs.*')
            ->get();

        return $magang;
    }
    public static function BimbinganByMagang()
    {
        $id = Auth::user()->id;
        $magang = DB::table('magangs')
            ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
            ->leftJoin('dosens', 'dosens.dosen_nip', '=', 'magangs.dosen_nip')
            ->leftJoin('bimbingan_magangs', 'bimbingan_magangs.magang_id', '=', 'magangs.magang_id')
            ->leftJoin('magang_industris', 'magang_industris.magang_id', '=', 'magangs.magang_id')
            ->join('users', 'users.email', '=', 'mahasiswas.email')
            ->select('*')
            ->where('users.id', $id)
            ->first();

        return $magang;
    }
    public static function BimbinganMHS()
    {
        // Mendapatkan email pengguna yang sedang terautentikasi
        $email = Auth::user()->email;

        // Mendapatkan magang_id dari tabel magangs berdasarkan email pengguna
        $magang_id = DB::table('magangs')
            ->join('mahasiswas', 'magangs.mhs_nim', '=', 'mahasiswas.mhs_nim')
            ->join('users', 'mahasiswas.email', '=', 'users.email')
            ->where('users.email', $email)
            ->value('magangs.magang_id');

        // Simpan magang_id ke dalam session
        session(['magang_id' => $magang_id]);

        // Mengambil data logbook_magangs berdasarkan magang_id dari session
        $bimbinganMagangs = DB::table('bimbingan_magangs')
            ->join('magangs', 'magangs.magang_id', '=', 'bimbingan_magangs.magang_id')
            ->select('magangs.magang_id', 'bimbingan_magangs.*')
            ->where('magangs.magang_id', $magang_id)
            ->get();

        return $bimbinganMagangs;
    }


    public static function seminarmhs()
    {
        $magang = DB::table('seminar_magangs')
            ->join('magangs', 'magangs.magang_id', '=', 'seminar_magangs.magang_id')
            ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
            ->join('dosens', 'dosens.dosen_nip', '=', 'magangs.dosen_nip')
            ->select('mahasiswas.*', 'dosens.*', 'seminar_magangs.*')
            ->get();
        return $magang;
    }
}
