<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdb extends Model
{
    use HasFactory;
    
    protected $table = 'pdb';
    protected $fillable = [
        'nama_pdb',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'agama',
        'berkebutuhan_khusus',
        'alamat_tempat_tinggal',
        'desa',
        'tempat_tinggal',
        'transportasi',
        'anak_ke',
        'nama_ayah',
        'tahun_lahir_ayah',
        'pendidikan_ayah',
        'penghasilan_ayah',
        'pekerjaan_ayah',
        'berkebutuhan_khusus_ayah',
        'nama_ibu',
        'tahun_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'berkebutuhan_khusus_ibu',
        'nama_wali',
        'tahun_lahir_wali',
        'pendidikan_wali',
        'penghasilan_wali',
        'kartu_keluarga',
        'akta_kelahiran',
        'email',
        'no_hp',
        'ktp_ayah',
        'ktp_ibu',
        'ktp_wali',
        'status_pendaftaran',
    ];
}
