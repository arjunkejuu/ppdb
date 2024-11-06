<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pdb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pdb');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('berkebutuhan_khusus');
            $table->string('alamat_tempat_tinggal');
            $table->string('desa');
            $table->string('tempat_tinggal');
            $table->string('transportasi');
            $table->integer('anak_ke')->default(1);
            $table->string('nama_ayah');
            $table->year('tahun_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('berkebutuhan_khusus_ayah');
            $table->string('nama_ibu');
            $table->year('tahun_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('berkebutuhan_khusus_ibu');
            $table->string('nama_wali')->nullable();
            $table->year('tahun_lahir_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('kartu_keluarga');
            $table->string('akta_kelahiran')->nullable();
            $table->string('email');
            $table->string('no_hp');
            $table->string('ktp_ayah')->nullable();
            $table->string('ktp_ibu')->nullable();
            $table->string('ktp_wali')->nullable();
            $table->string('status_formulir');
            $table->string('status_registrasi');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdb');
    }
};
