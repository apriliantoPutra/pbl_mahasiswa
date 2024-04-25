<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $primaryKey = 'id';
    protected $fillable = ['nilai_dosen', 'nilai_industri', 'nilai_akhir'];
}
