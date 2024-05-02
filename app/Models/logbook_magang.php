<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class logbook_magang extends Model
{
    use HasFactory;
    protected $primaryKey = 'logbook_id';
    public $timestamps = true;
    public static function LogbookByMagang()
    {
        $email = Auth::user()->email;
        $logbookMagangs = self::join('magangs', 'seminar_magangs.magang_id', '=', 'magangs.magang_id')
            ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
            ->join('dosens', 'dosens.dosen_nip', '=', 'magangs.dosen_nip')
            ->join('bimbingan_magangs', 'bimbingan_magangs.magang_id', '=', 'magangs.magang_id')
            ->join('users', 'users.email', '=', 'mahasiswas.email')
            ->select('seminar_magangs.*', 'mahasiswas.mhs_nim', 'mahasiswas.nama_id', 'dosens.dosen_nama', 'users.email')
            ->where('users.email', $email)
            ->get();

        return $logbookMagangs;
    }
}
