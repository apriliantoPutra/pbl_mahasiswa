<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Laporan_magang;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Laporan_magang::all();
        return view ('laporanmagang.laporanmagang')->with('laporanmagang', $data);
    }
 
    public function laporantambah(Request $request)
    {
      
          $data = new laporan_magang();
        
          $data->name = $request->name;
          $data->nim = $request->nim;
          $data->judul = $request->judul;
          $data->file = $request->file;
        $data->save();
        
        return redirect('/laporan-magang')->with('success', 'Berhasi Upload!');
    }

     //method untuk hapus data 
     public function laporanhapus($id)
     {
         $data=laporan_magang::find($id);
         $data->delete();
 
         return redirect()->back()->with('error', 'Berhasi Dihapus!');
     }

     //method untuk edit data 
    public function laporanedit($id, Request $request)
    {
      $request->validate([
        'name' => 'required',
          'nim' => 'required',
          'judul' => 'required',
          'file' => 'required',
          
    ]);

        $id = laporan_magang::find($id);
        $id->name   = $request->name;
        $id->nim      = $request->nim;
        $id->judul  = $request->judul;
        $id->file  = $request->file;
    

        $id->save();

        return redirect()->back();
    }
}
