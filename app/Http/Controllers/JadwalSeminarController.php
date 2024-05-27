<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSeminar;
use App\Models\Magang;
use App\Models\Menu;

class JadwalSeminarController extends Controller
{
    public function index()
    {
        $seminar = Magang::seminarmhs();
        return view(
            'jadwalseminar.seminar',
            compact('seminar')
        );
    }
}
