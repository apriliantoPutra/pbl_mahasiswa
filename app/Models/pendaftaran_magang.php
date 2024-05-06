<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pendaftaran_magang extends Model
{
    use HasFactory;
    public static function PendaftaranByMagang()
    {
        $pendaftaranMagangs = DB::table('magang_industris')
            ->join('industris', 'industris.industri_id', '=', 'magang_industris.industri_id')
            ->join('magangs', 'magangs.magang_id', '=', 'magang_industris.magang_id')
            ->select('magangs.magang_id', 'magang_industris.*', 'industris.*')
            ->get();

        return $pendaftaranMagangs;
    }
}
