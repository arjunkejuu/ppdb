<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $semuaForms = Pdb::all();
        $diperiksaPdbs = Pdb::where('status_pendaftaran', 'Sedang Diperiksa')->get();
        
        return view('dashboard.index', compact('semuaForms', 'diperiksaPdbs'));
    }
    
    public function detail($id_pdb)
    {
        $dataPdb = Pdb::where('id', $id_pdb)->firstOrFail();
        return view('dashboard.detail', compact('dataPdb'));
    }
    
    public function edit($id_pdb)
    {
        $dataPdb = Pdb::where('id', $id_pdb)->firstOrFail();
        return view('dashboard.edit', compact('dataPdb'));
    }
    
    public function update(Request $request, $id_pdb)
    {
        // Temukan data berdasarkan ID
        $pdb = Pdb::where('id', $id_pdb)->firstOrFail();

        // Perbarui data dengan data dari request
        $pdb->update($request->all());

        return redirect()->route('dashboard.detail', $id_pdb)->with('success', 'Data berhasil diperbarui!');
    }

}
