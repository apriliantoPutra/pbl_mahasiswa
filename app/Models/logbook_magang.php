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
    // public static function logbook_mhs()
    // {
    //     $email = Auth::user()->email;
    //     $logbook = DB::table('logbook_magangs')
    //         ->join('mahasiswas', 'mahasiswas.mhs_nim', '=', 'magangs.mhs_nim')
    //         ->join('magangs', 'magangs.magang_id', '=', 'logbook_magangs.magang_id')
    //         ->join('users', 'users.email', '=', 'mahasiswas.email')
    //         ->select('logbook_magangs.*', 'users.email', 'mahasiswas.*')
    //         ->where('users.email', $email)
    //         ->get();
    //     return $logbook;
    // }
}
