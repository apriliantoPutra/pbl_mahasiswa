<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe_laporan extends Model
{
    use HasFactory;
    protected $table = 'tipe_laporans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tipe_laporan'];

    public function nilai(){
        return $this->hasMany(nilai::class);
    }
}
