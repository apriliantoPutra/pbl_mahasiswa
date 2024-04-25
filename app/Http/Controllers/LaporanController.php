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
        return view ('laporanmagang.index')->with('laporanmagang', $data);
    }
    public function create(): View
    {
        return view('laporanmagang.create');
    }
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Laporan_magang::create($input);
        return redirect('laporanmagang')->with('success', 'Data berhasil disimpan.');;
    }
    public function show(string $id): View
    {
        $data = Laporan_magang::find($id);
        return view('laporanmagang.show')->with('laporanmagang', $data);
    }
    public function edit(string $id): View
    {
        $data = Laporan_magang::find($id);
        return view('laporanmagang.edit')->with('laporanmagang', $data);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = Laporan_magang::find($id);
        $input = $request->all();
        $data->update($input);
        return redirect('laporanmagang')->with('flash_message', 'student Updated!');  
    }
    
    public function destroy(string $id): RedirectResponse
    {
        Laporan_magang::destroy($id);
        return redirect('laporanmagang')->with('error', 'Data berhasil dihapus.');
    }
 
    
}
