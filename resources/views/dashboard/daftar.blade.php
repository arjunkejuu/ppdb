@extends('layouts.app')

@section('content')
    <div class="container bg-white rounded p-4">
        <form action="{{ route('dashboard.tambah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="d-flex">
                    <div class="me-auto p-2">
                        <a href="{{ route('dashboard.index') }}" class="btn border">
                            <i class="ri-arrow-go-back-line fs-5"></i>
                        </a>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="btn border">
                            <i class="ri-save-line fs-5"></i>
                        </button>
                    </div>
                </div>
                <h5 class="text-center mb-3">DATA RINCI</h5>
                
                {{-- Data PDB --}}
                <div class="border rounded p-3 position-relative mb-3">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Anak</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_pdb" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pdb" id="nama_pdb" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row align-items-center">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Laki-laki" name="inlineRadioOption" checked>
                                <label for="jenis_kelamin" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Perempuan" name="inlineRadioOption">
                                <label for="jenis_kelamin" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input name="tanggal_lahir" type="text" id="tanggal_lahir" class="date form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select name="agama" id="agama" class="form-select" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="berkebutuhan_khusus" class="col-sm-2 col-form-label">Berkebutuhan Khusus</label>
                        <div class="col-sm-10">
                            <select name="berkebutuhan_khusus" id="berkebutuhan_khusus" class="form-select" required>
                                <option value="Tidak">Tidak</option>
                                <option value="Netra (A)">Netra (A)</option>
                                <option value="Rungu (B)">Rungu (B)</option>
                                <option value="Granita Ringan (C)">Granita Ringan (C)</option>
                                <option value="Granita Sedang (C1)">Granita Sedang (C1)</option>
                                <option value="Daksa Ringan">Daksa Ringan (D)</option>
                                <option value="Daksa Sedang">Daksa Sedang (D1)</option>
                                <option value="Laras (E)">Laras (E)</option>
                                <option value="Wicara (F)">Wicara (F)</option>
                                <option value="Hyperaktif (H)">Hyperaktif (H)</option>
                                <option value="Cerdas Istimewa (I)">Cerdas Istimewa (I)</option>
                                <option value="Bakat Istimewa (J)">Bakat Istimewa (J)</option>
                                <option value="Kesulitan Belajar (K)">Kesulitan Belajar (K)</option>
                                <option value="Narkoba (N)">Narkoba (N)</option>
                                <option value="Indigo (O)">Indigo (O)</option>
                                <option value="Down Syndrome (P)">Down Syndrome (P)</option>
                                <option value="Autis (Q)">Autis (Q)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tempat_tinggal" class="col-sm-2 col-form-label">Tempat Tinggal</label>
                        <div class="col-sm-10">
                            <select name="tempat_tinggal" id="tempat_tinggal" class="form-select" required>
                                <option value="" disabled selected>Pilih Tempat Tinggal</option>
                                <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                <option value="Wali">Wali</option>
                                <option value="Kost">Kost</option>
                                <option value="Asrama">Asrama</option>
                                <option value="Panti Asuhan">Panti Asuhan</option>
                                <option value="Pesantren">Pesantren</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="anak_ke" class="col-sm-2 col-form-label">Anak Ke</label>
                        <div class="col-sm-10">
                            <input type="text" name="anak_ke" id="anak_ke" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="transportasi" class="col-sm-2 col-form-label">Transportasi</label>
                        <div class="col-sm-10">
                            <select name="transportasi" id="transportasi" class="form-select" required>
                                <option value="" disabled selected>Pilih Moda Transportasi</option>
                                <option value="Jalan Kaki">Jalan Kaki</option>
                                <option value="Angkutan Umum/Bus/Pete-pete">Angkutan Umum/Bus/Pete-pete</option>
                                <option value="Mobil/Bus Antar Jemput">Mobil/Bus Antar Jemput</option>
                                <option value="Kereta Api">Kereta Api</option>
                                <option value="Ojek">Ojek</option>
                                <option value="Andong/Bendi/Sado/Dokar/Delman/Becak">Andong/Bendi/Sado/Dokar/Delman/Becak</option>
                                <option value="Perahu Penyebrangan/Rakit/Getek">Perahu Penyebrangan/Rakit/Getek</option>
                                <option value="Kuda">Kuda</option>
                                <option value="Sepeda">Sepeda</option>
                                <option value="Sepeda Motor">Sepeda Motor</option>
                                <option value="Mobil Pribadi">Mobil Pribadi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="alamat_tempat_tinggal" class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="desa" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" name="desa" id="desa" class="form-control" required>
                        </div>
                    </div>
                </div>
                
                {{-- Data Ayah Kandung --}}
                <div class="border rounded p-3 position-relative mb-3">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Ayah Kandung</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tahun_lahir_ayah" class="col-sm-2 col-form-label">Tahun Lahir</label>
                        <div class="col-sm-10">
                            <input name="tahun_lahir_ayah" type="text" id="tahun_lahir_ayah" class="dateYear form-control"  required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pendidikan_ayah" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-select" required>
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="Informal">Informal</option>
                                <option value="Lainnya">Lainnya</option>
                                <option value="Non formal">Non formal</option>
                                <option value="Paket A">Paket A</option>
                                <option value="Paket B">Paket B</option>
                                <option value="Paket C">Paket C</option>
                                <option value="PAUD">PAUD</option>
                                <option value="Profesi">Profesi</option>
                                <option value="Putus SD">Putus SD</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S2 Terapan">S2 Terapan</option>
                                <option value="S3">S3</option>
                                <option value="S3 Terapan">S3 Terapan</option>
                                <option value="SD / sederajat">SD / sederajat</option>
                                <option value="SMA / sederajat">SMA / sederajat</option>
                                <option value="SMP / sederajat">SMP / sederajat</option>
                                <option value="Sp-1">Sp-1</option>
                                <option value="Sp-2">Sp-2</option>
                                <option value="Tidak sekolah">Tidak sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="berkebutuhan_khusus_ayah" class="col-sm-2 col-form-label">Berkebutuhan Khusus</label>
                        <div class="col-sm-10">
                            <select name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" class="form-select" required>
                                <option value="Tidak">Tidak</option>
                                <option value="Netra (A)">Netra (A)</option>
                                <option value="Rungu (B)">Rungu (B)</option>
                                <option value="Granita Ringan (C)">Granita Ringan (C)</option>
                                <option value="Granita Sedang (C1)">Granita Sedang (C1)</option>
                                <option value="Daksa Ringan">Daksa Ringan (D)</option>
                                <option value="Daksa Sedang">Daksa Sedang (D1)</option>
                                <option value="Laras (E)">Laras (E)</option>
                                <option value="Wicara (F)">Wicara (F)</option>
                                <option value="Hyperaktif (H)">Hyperaktif (H)</option>
                                <option value="Cerdas Istimewa (I)">Cerdas Istimewa (I)</option>
                                <option value="Bakat Istimewa (J)">Bakat Istimewa (J)</option>
                                <option value="Kesulitan Belajar (K)">Kesulitan Belajar (K)</option>
                                <option value="Narkoba (N)">Narkoba (N)</option>
                                <option value="Indigo (O)">Indigo (O)</option>
                                <option value="Down Syndrome (P)">Down Syndrome (P)</option>
                                <option value="Autis (Q)">Autis (Q)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pekerjaan_ayah" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-select" required>
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                <option value="Tidak bekerja">Tidak bekerja</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Petani">Petani</option>
                                <option value="Peternak">Peternak</option>
                                <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                <option value="Karyawan swasta">Karyawan swasta</option>
                                <option value="Pedagang kecil">Pedagang kecil</option>
                                <option value="Pedagang besar">Pedagang besar</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Tenaga Kerja Indonesia">Tenaga Kerja Indonesia</option>
                                <option value="Karyawan BUMN">Karyawan BUMN</option>
                                <option value="Tidak dapat diterapkan">Tidak dapat diterapkan</option>
                                <option value="Sudah meninggal">Sudah meninggal</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="penghasilan_ayah" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-10">
                            <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-select" required>
                                <option value="" disabled selected>Pilih Penghasilan Perbulan</option>
                                <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                {{-- Data Ibu Kandung --}}
                <div class="border rounded p-3 position-relative mb-3">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Ibu Kandung</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tahun_lahir_ibu" class="col-sm-2 col-form-label">Tahun Lahir</label>
                        <div class="col-sm-10">
                            <input name="tahun_lahir_ibu" type="text" id="tahun_lahir_ibu" class="dateYear form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pendidikan_ibu" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-select" required>
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="Informal">Informal</option>
                                <option value="Lainnya">Lainnya</option>
                                <option value="Non formal">Non formal</option>
                                <option value="Paket A">Paket A</option>
                                <option value="Paket B">Paket B</option>
                                <option value="Paket C">Paket C</option>
                                <option value="PAUD">PAUD</option>
                                <option value="Profesi">Profesi</option>
                                <option value="Putus SD">Putus SD</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S2 Terapan">S2 Terapan</option>
                                <option value="S3">S3</option>
                                <option value="S3 Terapan">S3 Terapan</option>
                                <option value="SD / sederajat">SD / sederajat</option>
                                <option value="SMA / sederajat">SMA / sederajat</option>
                                <option value="SMP / sederajat">SMP / sederajat</option>
                                <option value="Sp-1">Sp-1</option>
                                <option value="Sp-2">Sp-2</option>
                                <option value="Tidak sekolah">Tidak sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="berkebutuhan_khusus_ibu" class="col-sm-2 col-form-label">Berkebutuhan Khusus</label>
                        <div class="col-sm-10">
                            <select name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" class="form-select" required>
                                <option value="Tidak">Tidak</option>
                                <option value="Netra (A)">Netra (A)</option>
                                <option value="Rungu (B)">Rungu (B)</option>
                                <option value="Granita Ringan (C)">Granita Ringan (C)</option>
                                <option value="Granita Sedang (C1)">Granita Sedang (C1)</option>
                                <option value="Daksa Ringan">Daksa Ringan (D)</option>
                                <option value="Daksa Sedang">Daksa Sedang (D1)</option>
                                <option value="Laras (E)">Laras (E)</option>
                                <option value="Wicara (F)">Wicara (F)</option>
                                <option value="Hyperaktif (H)">Hyperaktif (H)</option>
                                <option value="Cerdas Istimewa (I)">Cerdas Istimewa (I)</option>
                                <option value="Bakat Istimewa (J)">Bakat Istimewa (J)</option>
                                <option value="Kesulitan Belajar (K)">Kesulitan Belajar (K)</option>
                                <option value="Narkoba (N)">Narkoba (N)</option>
                                <option value="Indigo (O)">Indigo (O)</option>
                                <option value="Down Syndrome (P)">Down Syndrome (P)</option>
                                <option value="Autis (Q)">Autis (Q)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pekerjaan_ibu" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-select" required>
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                <option value="Tidak bekerja">Tidak bekerja</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Petani">Petani</option>
                                <option value="Peternak">Peternak</option>
                                <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                <option value="Karyawan swasta">Karyawan swasta</option>
                                <option value="Pedagang kecil">Pedagang kecil</option>
                                <option value="Pedagang besar">Pedagang besar</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Tenaga Kerja Indonesia">Tenaga Kerja Indonesia</option>
                                <option value="Karyawan BUMN">Karyawan BUMN</option>
                                <option value="Tidak dapat diterapkan">Tidak dapat diterapkan</option>
                                <option value="Sudah meninggal">Sudah meninggal</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="penghasilan_ibu" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-10">
                            <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-select" required>
                                <option value="" disabled selected>Pilih Penghasilan Perbulan</option>
                                <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="ms-2 mb-4 row align-items-center">
                    <label for="wali" class="col-sm-2 col-form-label">Mempunyai Wali?</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline mt-1">
                            <input type="radio" class="form-check-input" value="show" name="toggle" onclick="toggleForm()">
                            <label for="wali" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                            <input type="radio" class="form-check-input" value="hide" name="toggle" onclick="toggleForm()" checked>
                            <label for="wali" class="form-check-label">Tidak</label>
                        </div>
                    </div>
                </div>
                
                {{-- Data Wali --}}
                <div id="formWali">
                    <div class="border rounded p-3 position-relative mb-3">
                        <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Wali</h5>
                        <div class="mb-2 mt-3 row">
                            <label for="nama_wali" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_wali" id="nama_wali" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="tahun_lahir_wali" class="col-sm-2 col-form-label">Tahun Lahir</label>
                            <div class="col-sm-10">
                                <input name="tahun_lahir_wali" type="text" id="tahun_lahir_wali" class="dateYear form-control">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="pendidikan_wali" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                                <select name="pendidikan_wali" id="pendidikan_wali" class="form-select">
                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="Informal">Informal</option>
                                    <option value="Lainnya">Lainnya</option>
                                    <option value="Non formal">Non formal</option>
                                    <option value="Paket A">Paket A</option>
                                    <option value="Paket B">Paket B</option>
                                    <option value="Paket C">Paket C</option>
                                    <option value="PAUD">PAUD</option>
                                    <option value="Profesi">Profesi</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S2 Terapan">S2 Terapan</option>
                                    <option value="S3">S3</option>
                                    <option value="S3 Terapan">S3 Terapan</option>
                                    <option value="SD / sederajat">SD / sederajat</option>
                                    <option value="SMA / sederajat">SMA / sederajat</option>
                                    <option value="SMP / sederajat">SMP / sederajat</option>
                                    <option value="Sp-1">Sp-1</option>
                                    <option value="Sp-2">Sp-2</option>
                                    <option value="Tidak sekolah">Tidak sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="pekerjaan_wali" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <select name="pekerjaan_wali" id="pekerjaan_wali" class="form-select">
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                    <option value="Karyawan swasta">Karyawan swasta</option>
                                    <option value="Pedagang kecil">Pedagang kecil</option>
                                    <option value="Pedagang besar">Pedagang besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Tenaga Kerja Indonesia">Tenaga Kerja Indonesia</option>
                                    <option value="Karyawan BUMN">Karyawan BUMN</option>
                                    <option value="Tidak dapat diterapkan">Tidak dapat diterapkan</option>
                                    <option value="Sudah meninggal">Sudah meninggal</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="penghasilan_wali" class="col-sm-2 col-form-label">Penghasilan</label>
                            <div class="col-sm-10">
                                <select name="penghasilan_wali" id="penghasilan_wali" class="form-select">
                                    <option value="" disabled selected>Pilih Penghasilan Perbulan</option>
                                    <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Berkas --}}
                <div class="border rounded p-3 position-relative">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Berkas</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="file" name="kartu_keluarga" id="formFile" class="form-control" onchange="previewImage(this, 'preview_kartu_keluarga')" accept=".jpg, .jpeg, .png, .pdf" required>
                            <div id="preview_kartu_keluarga" class="image-preview d-flex justify-content-center"></div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">Akta Kelahiran</label>
                        <div class="col-sm-10">
                            <input type="file" name="akta_kelahiran" id="formFile" class="form-control">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Ayah</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_ayah" id="formFile" class="form-control">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Ibu</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_ibu" id="formFile" class="form-control">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Wali</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_wali" id="formFile" class="form-control">
                        </div>
                    </div>
                </div>
                
                <input name="status_pendaftaran" type="text" value="Sedang Diperiksa" hidden>
            </div>
        </form>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>

{{-- Date Picker --}}
<script>
    $(document).ready(function () {
        var currentYear = new Date().getFullYear();
        
        $('.date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            orientation: 'bottom auto',
            keyboardNavigation: false,
            endDate: new Date((currentYear - 3), 11, 31)
        });
            
        $('.dateYear').datepicker({
            format: 'yyyy',
            autoclose: true,
            orientation: 'bottom auto',
            minViewMode: 2,
            maxViewMode: 2,
            endDate: new Date((currentYear - 10), 11, 31)
        });
    });
</script>

{{-- Memiliki Wali --}}
<script>
    function toggleForm() {
        var form = document.getElementById("formWali");
        var formUpload = document.getElementById("formWaliUpload");
        var showForm = document.querySelector('input[name="toggle"]:checked');
        
        if (showForm) { // Periksa apakah ada input yang terpilih
            var value = showForm.value;

            if (value === "show") {
                form.style.display = "block";
                formUpload.style.display = "block";
                // Tambahkan atribut 'required' pada semua input dan select
                form.querySelectorAll('input, select').forEach(function(element) {
                    element.setAttribute('required', 'required');
                });
            } else {
                form.style.display = "none";
                formUpload.style.display = "none";
                // Hapus atribut 'required' dari semua input dan select
                form.querySelectorAll('input, select').forEach(function(element) {
                    element.removeAttribute('required');
                });
            }
        } else {
            // Jika tidak ada input yang terpilih, sembunyikan formulir dan hapus atribut 'required'
            form.style.display = "none";
            formUpload.style.display = "none";
            form.querySelectorAll('input, select').forEach(function(element) {
                element.removeAttribute('required');
            });
        }
    }

    // Pastikan untuk memanggil toggleForm() setiap kali terjadi perubahan pada input toggle
    document.querySelectorAll('input[name="toggle"]').forEach(function(input) {
        input.addEventListener('change', toggleForm);
    });

    // Inisialisasi dengan memanggil toggleForm() saat halaman dimuat untuk mengatur keadaan awal
    document.addEventListener('DOMContentLoaded', toggleForm);
</script>

{{-- Alert ketika meninggalkan form --}}
<script>
    let isFormDirty = false;

    // Detect changes in the form
    const formElements = document.querySelectorAll('form input, form textarea, form select');
    formElements.forEach(element => {
        element.addEventListener('change', () => {
            isFormDirty = true;
        });
    });
    
    // Reset the isFormDirty flag when the form is submitted
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', () => {
            isFormDirty = false;
        });
    });

    // Warn the user when they try to leave the page with unsaved changes
    window.addEventListener('beforeunload', (event) => {
        if (isFormDirty) {
            event.preventDefault();
            event.returnValue = '';
        }
    });
</script>

{{-- Priview Gambar --}}
<script>
    function previewImage(input, previewId) {
        const maxFileSize = 5 * 1024 * 1024; // 2MB in bytes
        const preview = document.getElementById(previewId);
        preview.innerHTML = ''; // Clear any existing preview

        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Check file size
            if (file.size > maxFileSize) {
                alert('Ukuran file maksimal adalah 5MB');
                input.value = ''; // Clear the input
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';

                const link = document.createElement('a');
                link.href = e.target.result;
                link.target = '_blank';
                link.appendChild(img);

                preview.appendChild(link);
            };
            reader.readAsDataURL(file);
        }
    }
</script>

{{-- Scroll ke form yang dipilih --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah perangkat adalah smartphone berdasarkan ukuran layar
        if (window.innerWidth <= 768) {  // 768px adalah batas umum untuk smartphone
            // Ambil semua elemen input, select, dan textarea
            var elements = document.querySelectorAll('input, select, textarea');

            elements.forEach(function(element) {
                element.addEventListener('focus', function() {
                    // Scroll ke elemen yang di-fokuskan
                    element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                });
            });
        }
    });
</script>

{{-- Tidak Berpenghasilan] --}}
<script>
    function handlePekerjaanChange(pekerjaanSelectId, penghasilanSelectId) {
        const pekerjaanSelect = document.getElementById(pekerjaanSelectId);
        const penghasilanSelect = document.getElementById(penghasilanSelectId);

        pekerjaanSelect.addEventListener('change', function() {
            if (pekerjaanSelect.value === 'Tidak bekerja' || pekerjaanSelect.value === 'Sudah meninggal') {
                penghasilanSelect.value = 'Tidak berpenghasilan';
            } else {
                penghasilanSelect.value = "";
            }
        });
    }

    handlePekerjaanChange('pekerjaan_ayah', 'penghasilan_ayah');
    handlePekerjaanChange('pekerjaan_ibu', 'penghasilan_ibu');
    handlePekerjaanChange('pekerjaan_wali', 'penghasilan_wali');
</script>
@endpush