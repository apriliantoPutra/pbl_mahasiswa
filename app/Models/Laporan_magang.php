<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_magang extends Model
{
    use HasFactory;
    protected $table = 'laporan_magangs';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'nim', 'judul', 'file'];
}
