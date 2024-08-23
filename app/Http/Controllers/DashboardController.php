<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dataPdb($id_pdb)
    {
        $dataPdb = Pdb::where("id_pdb", $id_pdb)->firstOrFail();
        return view('admin.detail', compact('dataPdb'));
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $semuaForms = Pdb::all();
        $diperiksaPdbs = Pdb::where('status_pendaftaran', 'Sedang Diperiksa')->get();
        $dataPdbs = session('dataPdbs');
        
        return view('admin.dashboard', compact('semuaForms', 'diperiksaPdbs', 'dataPdbs'));
    }
    
    public function update(Request $request, $id_pdb)
    {
        // Temukan data berdasarkan ID dan perbarui
        $data = Pdb::where("id_pdb", $id_pdb)->firstOrFail();
        
        $data->update($request->all());
        
        // $data->nama_pdb = $request->input('nama_pdb');
        // // Update field lainnya
        // $data->save();

        return redirect()->route('admin.detail', $id_pdb)->with('success', 'Data berhasil diperbarui!');
        // return view('admin.detail', compact('data'));
    }

}
