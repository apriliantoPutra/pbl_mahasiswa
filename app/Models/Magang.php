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
        $email = Auth::user()->email;
        $magang = DB::table('magangs')
            ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
            ->join('dosens', 'dosens.dosen_nip', '=', 'magangs.dosen_nip')
            ->join('bimbingan_magangs', 'bimbingan_magangs.magang_id', '=', 'magangs.magang_id')
            ->join('users', 'users.email', '=', 'mahasiswas.email')
            ->select('mahasiswas.*', 'dosens.*', 'bimbingan_magangs.*')
            ->where('users.email', $email)
            ->get();

        return $magang;
    }
}
