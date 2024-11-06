<?php

namespace App\Http\Controllers;

use App\Mail\PendaftaranBerhasil;
use App\Models\Pdb;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PdbExportController;

class PdbController extends Controller
{   
    public function daftar(Request $request)
    {
        // Konversi tanggal lahir
        $tanggalLahir = Carbon::createFromFormat('d/m/Y', $request->input('tanggal_lahir'))->format('Y-m-d');
        $request->merge(['tanggal_lahir' => $tanggalLahir]);
        
        // Array menyimpan path file
        $uploadedFiles = [];
        
        DB::beginTransaction();
        try {
            // Proses file
            foreach ([
                'kartu_keluarga',
                'akta_kelahiran',
                'ktp_ayah',
                'ktp_ibu',
                'ktp_wali',
                ] as $fileInput){
                if ($request->hasFile($fileInput)){
                    $file = $request->file($fileInput);
                    $filename = time().'_'.$file->getClientOriginalName();
                    $path = $file->storeAs('upload', $filename, 'public');
                    
                    $uploadedFiles[$fileInput] = 'upload/'. $filename;
                }
            }
            
            // Merge data file dengan data request lainnya
            $data = array_merge($request->all(), $uploadedFiles);
            
            // dd($request->all());
            
            // Simpan data ke database
            $pdb = Pdb::create($data);
            
            DB::commit();
            
            $exportWord = new PdbExportController;
            $filePath = $exportWord->exportToWord($pdb->id, false);
            
            Mail::to($pdb->email)->send(new PendaftaranBerhasil($pdb, $filePath));  
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar.']);
        }
        
        return redirect()->back()->with('successDaftar', 'Pendaftaran berhasil! silahkan cek di halaman status pendaftaran atau tunggu email notifikasi yang dikirim ke email anda');
    }
    
    public function index()
    {
        return view('pdb.pendaftaran');
    }
}
