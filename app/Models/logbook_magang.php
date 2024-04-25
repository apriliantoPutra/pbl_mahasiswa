<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logbook_magang extends Model
{
    use HasFactory;
    protected $primaryKey = 'logbook_id';
    public $timestamps = true;
}
