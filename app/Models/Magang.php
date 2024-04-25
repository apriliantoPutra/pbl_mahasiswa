<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Magang extends Model
{
    use HasFactory;

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
}
