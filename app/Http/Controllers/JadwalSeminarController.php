<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSeminar;
use App\Models\Menu;

class JadwalSeminarController extends Controller
{
   public function index()
   {
      $data = JadwalSeminar::all();

      return view('jadwalseminar.seminar', ['seminar_magangs' => $data]);
   }
}
