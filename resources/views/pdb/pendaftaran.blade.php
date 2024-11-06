@extends('layouts.app')

@section('content')
<div class="container step-pendaftaran p-5">
    <div class="progress px-4" style="height: 3px">
        <div id="progress-bar" class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="step-container d-flex justify-content-between">
        <div class="d-flex align-items-center flex-column">
            <p><small>Data Anak</small></p>
            <div class="step-circle">1</div>
        </div>
        <div class="d-flex align-items-center flex-column">
            <p><small>Data Orang Tua</small></p>
            <div class="step-circle">2</div>
        </div>
        <div class="d-flex align-items-center flex-column">
            <p><small>Upload Berkas</small></p>
            <div class="step-circle">3</div>
        </div>
    </div>
</div>
<div class="container bg-white p-5 rounded">
    <form action="{{ route('pdb.daftar') }}" id="formPendaftaran" method="POST" enctype="multipart/form-data">
        
        {{-- Data Anak --}}
        <div class="step active">
            <div class="row justify-content-center text-center mb-3">
                <h5>DATA ANAK</h5>
            </div>
            <div class="form-group">
                @csrf
                <div class="row mb-5">
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input name="nama_pdb" type="text" class="form-control" placeholder="Masukkan Nama Lengkap ..." required onkeydown="return /[A-Za-z\s]/i.test(event.key)">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline mt-1 col-4">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Laki-laki" name="inlineRadioOption" checked>
                                <label for="" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline mt-1 col-4">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Perempuan" name="inlineRadioOption">
                                <label for="" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="text" id="" class="date form-control" placeholder="HH/BB/TTTT" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" placeholder="Masukkan Tempat Lahir ..." onkeydown="return /[A-Za-z\s]/i.test(event.key)" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Agama</label>
                        <select name="agama" id="" class="form-select" required>
                            <option value="" disabled selected>Pilih Agama ...</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Berkebutuhan Khusus</label>
                        <select name="berkebutuhan_khusus" id="" class="form-select" required>
                            <option value="Tidak" selected>Tidak</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Tempat Tinggal</label>
                        <select name="tempat_tinggal" id="" class="form-select" required>
                            <option value="" disabled selected>Pilih Tempat Tinggal ...</option>
                            <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                            <option value="Wali">Wali</option>
                            <option value="Kost">Kost</option>
                            <option value="Asrama">Asrama</option>
                            <option value="Panti Asuhan">Panti Asuhan</option>
                            <option value="Pesantren">Pesantren</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Anak Ke-Berapa (Berdasarkan KK)</label>
                        <input name="anak_ke" type="text" class="form-control" placeholder="Anak Ke- ..." oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Moda Transportasi</label>
                        <select name="transportasi" id="" class="form-select" required>
                            <option value="" disabled selected>Pilih Moda Transportasi ...</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Alamat Tempat Tinggal</label>
                        <textarea name="alamat_tempat_tinggal" id="" class="form-control" rows="5" placeholder="Masukkan Alamat Tempat Tinggal ..." required></textarea>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Desa/Kelurahan</label>
                        <input name="desa" type="text" class="form-control" placeholder="Masukkan Desa/Kelurahan ..." required>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <button class="btn btn-primary" style="visibility: hidden">
                        Data Orang Tua <i class="ri-arrow-right-s-line fs-6"></i>
                    </button>
                    <button class="btn btn-primary" type="button" onclick="nextStep()">
                        Data Orang Tua <i class="ri-arrow-right-s-line fs-6"></i>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Data Orangtua --}}
        <div class="step">
            <div class="row justify-content-center text-center mb-3">
                <h5>DATA ORANG TUA</h5>
            </div>
            <div class="form-group">
                @csrf
                <h5 class="fw-bold">Ayah Kandung</h5>
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input name="nama_ayah" type="text" class="form-control" placeholder="Masukkan Nama Lengkap ..." onkeydown="return /[A-Za-z\s]/i.test(event.key)" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Tahun Lahir</label>
                        <input name="tahun_lahir_ayah" type="text" class="dateYear form-control" placeholder="TTTT" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="4" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Pendidikan</label>
                        <select name="pendidikan_ayah" id="" class="form-select" required>
                            <option value="" disabled selected>Pilih Pendidikan ...</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Berkebutuhan Khusus</label>
                        <select name="berkebutuhan_khusus_ayah" id="" class="form-select" required>
                            <option value="Tidak" selected>Tidak</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Pekerjaan</label>
                        <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-select" required>
                            <option value="" disabled selected>Pilih Pekerjaan ...</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Penghasilan</label>
                        <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-select" required>
                            <option value="" disabled selected>Pilih Penghasilan Perbulan ...</option>
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
                <h5 class="fw-bold">Ibu Kandung</h5>
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input name="nama_ibu" type="text" class="form-control" placeholder="Masukkan Nama Lengkap ..." onkeydown="return /[A-Za-z\s]/i.test(event.key)" required>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Tahun Lahir</label>
                        <input name="tahun_lahir_ibu" type="text" required class="dateYear form-control" placeholder="TTTT" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="4">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Pendidikan</label>
                        <select name="pendidikan_ibu" id="" class="form-select" required>
                            <option value="" disabled selected>Pilih Pendidikan ...</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Berkebutuhan Khusus</label>
                        <select name="berkebutuhan_khusus_ibu" id="" class="form-select" required>
                            <option value="Tidak" selected>Tidak</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Pekerjaan</label>
                        <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-select" required>
                            <option value="" disabled selected>Pilih Pekerjaan ...</option>
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
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Penghasilan</label>
                        <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-select" required>
                            <option value="" disabled selected>Pilih Penghasilan Perbulan ...</option>
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
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="" class="ms-2">Mempunyai Wali?</label>
                        <div>
                            <div class="form-check form-check-inline mt-1 col-4">
                                <input type="radio" class="form-check-input" value="show" name="toggle" onclick="toggleForm()">
                                <label for="" class="form-check-label">Ya</label>
                            </div>
                            <div class="form-check form-check-inline mt-1 col-4">
                                <input type="radio" class="form-check-input" value="hide" name="toggle" onclick="toggleForm()" checked>
                                <label for="" class="form-check-label">Tidak</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formWali">
                    <h5 class="fw-bold">Wali Murid</h5>
                    <div class="row mb-5">
                        <div class="mb-3 col-lg-4">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input name="nama_wali" type="text" class="form-control" id="" placeholder="Masukkan Nama Lengkap ..." onkeydown="return /[A-Za-z\s]/i.test(event.key)">
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="" class="form-label">Tahun Lahir</label>
                            <input name="tahun_lahir_wali" type="text" class="dateYear form-control" id="" placeholder="TTTT" onkeydown="return /[0-9]/i.test(event.key)">
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="" class="ms-2">Pendidikan</label>
                            <select name="pendidikan_wali" id="hiddenInput" class="form-select">
                                <option value="" disabled selected>Pilih Pendidikan ...</option>
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
                        <div class="mb-3 col-lg-4">
                            <label for="" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan_wali" id="pekerjaan_wali" class="form-select">
                                <option value="" disabled selected>Pilih Pekerjaan ...</option>
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
                        <div class="mb-3 col-lg-4">
                            <label for="" class="form-label">Penghasilan</label>
                            <select name="penghasilan_wali" id="penghasilan_wali" class="form-select">
                                <option value="" disabled selected>Pilih Penghasilan Perbulan ...</option>
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
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <button class="btn btn-primary" type="button" onclick="prevStep()">
                        <i class="ri-arrow-left-s-line fs-6"></i> Data Anak
                    </button>
                    <button class="btn btn-primary" type="button" onclick="nextStep()">
                        Upload Berkas <i class="ri-arrow-right-s-line fs-6"></i>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Upload Berkas --}}
        <div class="step">
            <div class="row justify-content-center text-center mb-3">
                <h5>UPLOAD BERKAS</h5>
            </div>
            <div class="form-group">
                @csrf
                <div class="row">
                    <div class="mb-3 col-lg-12">
                        <p>Pastikan gambar yang di unggah:</p>
                        <ul>
                            <li>Tidak buram</li>
                            <li>Tidak salah</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="kk" class="form-label">Upload Kartu Keluarga</label>
                        <input id="kk" name="kartu_keluarga" class="form-control" type="file" onchange="validateDocument(this, 'kk')" accept=".jpg, .jpeg, .png" required>
                        <div class="form-text">.jpg .png .jpeg</div>
                        <div id="loading_message_kk" class="text-info mt-2" style="display:none;">Sedang memproses gambar...</div>
                        <div id="success_message_kk" class="text-success mt-2" style="display:none;">Gambar Kartu Keluarga valid.</div>
                        <div id="error_message_kk" class="text-danger mt-2"></div>
                        <div id="preview_kk" class="image-preview d-flex justify-content-center mt-2"></div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="akta" class="form-label">Akta Kelahiran</label>
                        <input id="akta_kelahiran" name="akta_kelahiran" class="form-control" type="file" onchange="validateDocument(this, 'akta')" accept=".jpg, .jpeg, .png" required>
                        <div class="form-text" id="basic-addon5">.jpg .png .jpeg</div>
                        <div id="loading_message_akta" class="text-info mt-2" style="display:none;">Sedang memproses gambar...</div>
                        <div id="success_message_akta" class="text-success mt-2" style="display:none;">Gambar Akta Kelahiran valid.</div>
                        <div id="error_message_akta" class="text-danger mt-2"></div>
                        <div id="preview_akta" class="image-preview d-flex justify-content-center mt-2"></div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="ktp_ayah" class="form-label">Upload KTP Ayah</label>
                        <input id="ktp_ayah" name="ktp_ayah" class="form-control" type="file" onchange="validateDocument(this, 'ktp_ayah')" accept=".jpg, .jpeg, .png" required>
                        <div class="form-text">.jpg .png .jpeg</div>
                        <div id="loading_message_ktp_ayah" class="text-info mt-2" style="display:none;">Sedang memproses gambar...</div>
                        <div id="success_message_ktp_ayah" class="text-success mt-2" style="display:none;">Gambar KTP Ayah valid.</div>
                        <div id="error_message_ktp_ayah" class="text-danger mt-2"></div>
                        <div id="preview_ktp_ayah" class="image-preview d-flex justify-content-center mt-2"></div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="ktp_ibu" class="form-label">Upload KTP Ibu</label>
                        <input id="ktp_ibu" name="ktp_ibu" class="form-control" type="file" onchange="validateDocument(this, 'ktp_ibu')" accept=".jpg, .jpeg, .png" required>
                        <div class="form-text">.jpg .png .jpeg</div>
                        <div id="loading_message_ktp_ibu" class="text-info mt-2" style="display:none;">Sedang memproses gambar...</div>
                        <div id="success_message_ktp_ibu" class="text-success mt-2" style="display:none;">Gambar KTP Ibu valid.</div>
                        <div id="error_message_ktp_ibu" class="text-danger mt-2"></div>
                        <div id="preview_ktp_ibu" class="image-preview d-flex justify-content-center mt-2"></div>
                    </div>
                    <div id="formWaliUpload">
                        <div class="mb-3 col-lg-4">
                            <label for="ktp_wali" class="form-label">Upload KTP Wali</label>
                            <input id="ktp_wali" name="ktp_wali" class="form-control" type="file" onchange="validateDocument(this, 'ktp_wali')" accept=".jpg, .jpeg, .png">
                            <div class="form-text">.jpg .png .jpeg</div>
                            <div id="loading_message_ktp_wali" class="text-info mt-2" style="display:none;">Sedang memproses gambar...</div>
                            <div id="success_message_ktp_wali" class="text-success mt-2" style="display:none;">Gambar KTP Wali valid.</div>
                            <div id="error_message_ktp_wali" class="text-danger mt-2"></div>
                            <div id="preview_ktp_wali" class="image-preview d-flex justify-content-center mt-2"></div>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Email</label>
                        <input name="email" class="form-control" type="email" id="" placeholder="contoh@gmail.com" required inputmode="email">
                        <div class="form-text" id="basic-addon4">Gunakan email yang aktif</div>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="" class="form-label">Nomor Handphone</label>
                        <input name="no_hp" class="form-control" type="text" id="" placeholder="08123456xxx" onkeydown="return /[0-9]/i.test(event.key)" maxlength="13" minlength="10" required>
                        <div class="form-text" id="basic-addon4">Gunakan nomor handphone yang aktif</div>
                    </div>
                    <input name="status_formulir" type="text" value="Diperiksa" hidden>
                    <input name="status_registrasi" type="text" value="Menunggu Status Formulir Diterima" hidden>
                </div>
            </div>
        
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <button class="btn btn-primary" type="button" onclick="prevStep()">
                        <i class="ri-arrow-left-s-line fs-6"></i> Data Orang Tua
                    </button>
                    <button id="submitButton" class="btn btn-primary" type="submit">
                        Daftar <i class="ri-arrow-right-s-line fs-6"></i>
                    </button>                    
                </div>
            </div>
        </div>
        
    </form>
    
    <!-- Success Modal -->
    <div class="modal fade" id="successModalDaftar" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Pendaftaran Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('successDaftar') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="{{ url('/status-pendaftaran') }}">Status pendaftaran</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal untuk Crop -->
    <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropModalLabel">Crop Gambar Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cropImageContainer" style="width: 100%; height: 80vh;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning" id="rotateButton">Putar Gambar</button>
                    <button type="button" class="btn btn-primary" id="cropAndUploadButton">Crop dan Proses OCR</button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Unsaved Changed --}}
    <div class="modal fade" id="unsavedChangedModal" tabindex="-1" aria-labelledby="unsavedChangedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unsavedChangedModal">Pemberitahuan !!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda akan meninggalkan isian Formulir Pendaftaran ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Melanjutkan isi Formulir</button>
                    <button type="button" id="leavePageButton" class="btn btn-secondary" data-bs-dismiss="modal">Keluar dari halaman</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.1/dist/tesseract.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

{{-- Modal Berhasil --}}
<script>
    $(document).ready(function(){
        @if(session('successDaftar'))
            $('#successModalDaftar').modal('show');
        @endif
    });
</script>

{{-- Multi Form --}}
<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');
    const progressBar = document.getElementById('progress-bar');
            
    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === stepIndex);
        });
                
        window.scrollTo(0, 0);
                
        const progress = (currentStep) / 2 * 98;
        progressBar.style.width = `${progress}%`;
        progressBar.setAttribute('aria-valuenow', progress);
    }
            
    function nextStep() {
        if (validateForm()) {
            currentStep++;
            showStep(currentStep);
        }
    }
            
    function prevStep() {
        currentStep--;
        showStep(currentStep);
    }
            
    function validateForm() {
        const currentInputs = steps[currentStep].querySelectorAll('input, select, textarea');
        for (let input of currentInputs) {
            if (!input.checkValidity()) {
                input.reportValidity();
                return false
            }
        }
        return true;
    }
</script>

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
    let intendedHref = '';

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
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', (event) => {
            if(isFormDirty){
                event.preventDefault();
                intendedHref = link.href;
                const modal = new bootstrap.Modal(document.getElementById('unsavedChangedModal'));
                modal.show();
            }
        })
    })
    
    window.addEventListener('beforeunload', (event) => {
        if (isFormDirty) {
            // This will show the browser's default alert, not the modal
            event.preventDefault();
            event.returnValue = ''; // Required for some browsers
        }
    });

    
    document.getElementById('leavePageButton').addEventListener('click', () => {
        isFormDirty = false;
        window.location.href = intendedHref; // Force page reload to proceed with navigation
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

{{-- Validasi KTP, KK --}}
<script>
    let cropper;
    let currentInput; // Untuk menyimpan input file saat ini
    let rotation = 0;

    function validateDocument(input, jenisDocument) {
        // Reset pesan sebelum memproses gambar baru
        document.getElementById('success_message_' + jenisDocument).style.display = 'none';
        document.getElementById('error_message_' + jenisDocument).innerText = '';

        const file = input.files[0];
        if (!file) {
            document.getElementById('error_message_' + jenisDocument).innerText = "Tidak ada file yang dipilih.";
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const imgElement = document.createElement('img');
            imgElement.id = jenisDocument + '_crop_img';
            imgElement.src = e.target.result;
            imgElement.style.maxWidth = '100%';
            imgElement.style.height = 'auto';

            document.getElementById('cropImageContainer').innerHTML = '';
            document.getElementById('cropImageContainer').appendChild(imgElement);

            // Simpan input saat ini
            currentInput = jenisDocument;

            // Tampilkan modal
            const cropModal = new bootstrap.Modal(document.getElementById('cropModal'), {
                backdrop: 'static',
                keyboard: false
            });
            cropModal.show();

            cropModal._element.addEventListener('shown.bs.modal', function () {
                let aspectRatio = 16 / 10; // Default untuk KTP Ayah dan Ibu
                if (jenisDocument === 'kk') {
                    aspectRatio = 16 / 11; // Aspek rasio untuk Kartu Keluarga
                } else if (jenisDocument === 'akta') {
                    aspectRatio = 16 / 20;
                }
                
                cropper = new Cropper(imgElement, {
                    aspectRatio: aspectRatio,
                    viewMode: 1,
                    autoCropArea: 1,
                    scalable: true,
                    zoomable: true,
                    responsive: true,
                    restore: true
                });
                
                rotation = 0;
            });

            cropModal._element.addEventListener('hidden.bs.modal', function () {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
            });

            // Tampilkan tombol crop
            document.getElementById('cropButton').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
    
    document.getElementById('rotateButton').addEventListener('click', function () {
        if (cropper) {
            rotation += 90; // Tambahkan 90 derajat pada setiap klik
            cropper.rotate(90); // Putar gambar 90 derajat
        }
    });

    document.getElementById('cropAndUploadButton').addEventListener('click', function () {
        if (cropper) {
            const jenisDocument = currentInput; // Mendapatkan jenis dokumen yang sedang aktif
            document.getElementById('loading_message_' + jenisDocument).style.display = 'block';

            const croppedCanvas = cropper.getCroppedCanvas();
            const croppedImage = document.createElement('img');
            croppedImage.src = croppedCanvas.toDataURL('image/jpeg');
            croppedImage.style.maxWidth = '100%';

            document.getElementById('preview_' + jenisDocument).innerHTML = '';
            document.getElementById('preview_' + jenisDocument).appendChild(croppedImage);

            const cropModal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
            cropModal.hide();

            croppedCanvas.toBlob(function (blob) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    Tesseract.recognize(
                        e.target.result,
                        'ind',
                        {
                            logger: function (m) {
                                console.log(m);
                            }
                        }
                    ).then(({ data: { text } }) => {
                        if (isValidDocument(text, jenisDocument)) {
                            document.getElementById('success_message_' + jenisDocument).style.display = 'block';
                        } else {
                            document.getElementById('error_message_' + jenisDocument).innerText = 'Dokumen tidak valid.';
                        }

                        if (cropper) {
                            cropper.destroy();
                            cropper = null;
                        }
                    }).finally(() => {
                        document.getElementById('loading_message_' + jenisDocument).style.display = 'none';
                    });
                };
                reader.readAsDataURL(blob);
            });
        }
    });

    function isValidDocument(text, jenisDocument) {
        // Validasi untuk KTP Ayah, KTP Ibu, dan Kartu Keluarga
        if (jenisDocument === 'ktp_ayah' || jenisDocument === 'ktp_ibu') {
            return text.includes('NIK') || text.includes('KTP');
        } else if (jenisDocument === 'kk') {
            return text.includes('Kartu Keluarga') || text.includes('Kepala Keluarga');
        } else if (jenisDocument === 'akta') {
            return text.includes('Akta Kelahiran') || text.includes('Pencatatan Sipil');
        }
        return false;
    }
</script>
@endpush