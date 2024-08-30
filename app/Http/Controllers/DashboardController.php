<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        // Konversi tanggal lahir
        $tanggalLahir = Carbon::createFromFormat('d/m/Y', $request->input('tanggal_lahir'))->format('Y-m-d');
        $request->merge(['tanggal_lahir' => $tanggalLahir]);

        // Perbarui data selain file
        $pdb->fill($request->except('file'));

        // Periksa apakah ada file yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($pdb->file_path && Storage::exists($pdb->file_path)) {
                Storage::delete($pdb->file_path);
            }

            // Simpan file baru dan ambil path-nya
            $file = $request->file('file');
            $filePath = $file->store('upload', 'public');

            // Perbarui path file di database
            $pdb->file_path = $filePath;
        }

        // Simpan perubahan
        $pdb->save();

        return redirect()->route('dashboard.detail', $id_pdb)->with('success', 'Data berhasil diperbarui!');
    }

}
