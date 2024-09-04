<?php

namespace App\Http\Controllers;

use App\Mail\StatusPendaftaranChanged;
use Carbon\Carbon;
use App\Models\Pdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $diterimaPdbs = Pdb::where('status_pendaftaran', 'Diterima')->get();
        $ditolakPdbs = Pdb::where('status_pendaftaran', 'Ditolak')->get();
        
        return view('dashboard.index', compact('semuaForms', 'diperiksaPdbs', 'diterimaPdbs', 'ditolakPdbs'));
    }
    
    public function daftar()
    {
        return view('dashboard.daftar');
    }
    
    public function tambah(Request $request)
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
            
            // Simpan data ke database
            Pdb::create($data);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errorModal' => 'Terjadi kesalahan saat mendaftar.']);
        }
        
        return redirect()->route('dashboard.index')->with('successModal', 'Pendaftaran berhasil!');
    }
    
    public function detail($id_pdb)
    {
        $dataPdb = Pdb::where('id', $id_pdb)->firstOrFail();
        return view('dashboard.detail', compact('dataPdb'));
    }
    
    public function edit($id_pdb)
    {
        $dataPdb = Pdb::where('id', $id_pdb)->firstOrFail();
        
        if ($dataPdb->status_pendaftaran === 'Diterima' || $dataPdb->status_pendaftaran === 'Ditolak') {
            // Redirect ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('errorModal', 'Anda tidak dapat mengedit data yang telah diterima atau ditolak.');
        }
        
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
        $pdb->fill($request->except(['kartu_keluarga', 'akta_kelahiran', 'ktp_ayah', 'ktp_ibu', 'ktp_wali']));

        // Inisialisasi array untuk menyimpan path file yang diupload
        $uploadedFiles = [];

        // Periksa dan proses setiap file yang diupload
        foreach ([
                    'kartu_keluarga',
                    'akta_kelahiran',
                    'ktp_ayah',
                    'ktp_ibu',
                    'ktp_wali',
                ] as $fileInput) {
            if ($request->hasFile($fileInput)) {
                // Hapus file lama jika ada
                if ($pdb->$fileInput && Storage::exists($pdb->$fileInput)) {
                    Storage::delete($pdb->$fileInput);
                }

                // Simpan file baru dan ambil path-nya
                $file = $request->file($fileInput);
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('upload', $filename, 'public');

                // Simpan path file yang baru di array
                $uploadedFiles[$fileInput] = 'upload/' . $filename;
            }
        }

        // Perbarui path file di database
        foreach ($uploadedFiles as $key => $path) {
            $pdb->$key = $path;
        }
        
        if (in_array($pdb->status_pendaftaran, ['Diterima', 'Ditolak'])) {
            Mail::to($pdb->email)->send(new StatusPendaftaranChanged($pdb));
        }

        // Simpan perubahan
        $pdb->save();

        return redirect()->route('dashboard.detail', $id_pdb)->with('successModal', 'Data berhasil diperbarui!');
    }
    
    public function destroy($id_pdb)
    {
        $pdb = Pdb::findOrFail($id_pdb);
        $pdb->delete();
        
        return redirect()->route('dashboard.index')->with('successModal', 'Data berhasil dihapus');
    }

}
