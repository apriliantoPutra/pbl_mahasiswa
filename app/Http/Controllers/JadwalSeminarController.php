<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSeminar;
use App\Models\Menu;

class JadwalSeminarController extends Controller
{
   public function index()
   {
       $seminar_magangs = JadwalSeminar::all(); // Fetch data from the JadwalSeminar model
   
       return view('jadwalseminar.seminar', ['seminar_magangs' => $seminar_magangs]); // Pass the fetched data to the view
   }
   
}
