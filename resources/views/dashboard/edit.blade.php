@extends('layouts.app')

@section('content')
    <div class="container bg-white rounded p-4">
        <form action="{{ route('dashboard.update', $dataPdb->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="d-flex">
                    <div class="me-auto p-2">
                        <a href="{{ route('dashboard.index') }}" class="btn border">
                            <i class="ri-arrow-go-back-line fs-5"></i>
                        </a>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('dashboard.detail', $dataPdb->id) }}" class="btn border">
                            <i class="ri-eye-line fs-5"></i>
                        </a>
                    </div>
                    <div class="p-2" id="editButton">
                        <button type="submit" class="btn border">
                            <i class="ri-save-line fs-5"></i>
                        </button>
                    </div>
                </div>
                <h5 class="text-center mb-4">DATA RINCI</h5>
                
                {{-- Data PDB --}}
                <div class="border rounded p-3 position-relative mb-4">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Anak</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_pdb" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pdb" id="nama_pdb" class="form-control" value="{{ old('nama_pdb', $dataPdb->nama_pdb) }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row align-items-center">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            @if ($dataPdb->jenis_kelamin == 'Laki-laki')
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Laki-laki" name="inlineRadioOption" checked>
                                <label for="jenis_kelamin" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Perempuan" name="inlineRadioOption">
                                <label for="jenis_kelamin" class="form-check-label">Perempuan</label>
                            </div>
                            @else
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Laki-laki" name="inlineRadioOption">
                                <label for="jenis_kelamin" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="jenis_kelamin" type="radio" class="form-check-input" value="Perempuan" name="inlineRadioOption" checked>
                                <label for="jenis_kelamin" class="form-check-label">Perempuan</label>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input name="tanggal_lahir" type="text" id="tanggal_lahir" class="date form-control" value="{{ \Carbon\Carbon::parse(old('tanggal_lahir', $dataPdb->tanggal_lahir))->format('d/m/Y') }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $dataPdb->tempat_lahir }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select name="agama" id="agama" class="form-select" required>
                                <option value="{{ $dataPdb->agama }}" hidden selected>{{ $dataPdb->agama }}</option>
                                <option value="" disabled>Pilih Agama</option>
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
                                <option value="{{ $dataPdb->berkebutuhan_khusus }}" hidden selected>{{ $dataPdb->berkebutuhan_khusus }}</option>
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
                            <input type="text" name="tempat_tinggal" id="tempat_tinggal" class="form-control" value="{{ $dataPdb->tempat_tinggal }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="anak_ke" class="col-sm-2 col-form-label">Anak Ke</label>
                        <div class="col-sm-10">
                            <input type="text" name="anak_ke" id="anak_ke" class="form-control" value="{{ $dataPdb->anak_ke }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="transportasi" class="col-sm-2 col-form-label">Transportasi</label>
                        <div class="col-sm-10">
                            <select name="transportasi" id="transportasi" class="form-select" required>
                                <option value="{{ $dataPdb->transportasi }}" hidden selected>{{ $dataPdb->transportasi }}</option>
                                <option value="" disabled>Pilih Moda Transportasi ...</option>
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
                            <textarea name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" rows="5" class="form-control" required>{{ old('alamat_tempat_tinggal', $dataPdb->alamat_tempat_tinggal) }}</textarea>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="desa" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" name="desa" id="desa" class="form-control" value="{{ $dataPdb->desa }}" required>
                        </div>
                    </div>
                </div>
                
                {{-- Data Ayah Kandung --}}
                <div class="border rounded p-3 position-relative mb-4">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Ayah Kandung</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="{{ $dataPdb->nama_ayah }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tahun_lahir_ayah" class="col-sm-2 col-form-label">Tahun Lahir</label>
                        <div class="col-sm-10">
                            <input name="tahun_lahir_ayah" type="text" id="tahun_lahir_ayah" class="dateYear form-control" value="{{ old('tahun_lahir_ayah', $dataPdb->tahun_lahir_ayah) }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pendidikan_ayah" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-select" required>
                                <option value="{{ $dataPdb->pendidikan_ayah }}" hidden selected>{{ $dataPdb->pendidikan_ayah }}</option>
                                <option value="" disabled>Pilih Pendidikan ...</option>
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
                                <option value="{{ $dataPdb->berkebutuhan_khusus_ayah }}" hidden selected>{{ $dataPdb->berkebutuhan_khusus_ayah }}</option>
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
                                <option value="{{ $dataPdb->pekerjaan_ayah }}" hidden selected>{{ $dataPdb->pekerjaan_ayah }}</option>
                                <option value="" disabled>Pilih Pekerjaan ...</option>
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
                                <option value="{{ $dataPdb->penghasilan_ayah }}" hidden selected>{{ $dataPdb->penghasilan_ayah }}</option>
                                <option value="" disabled>Pilih Penghasilan Perbulan ...</option>
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
                <div class="border rounded p-3 position-relative mb-4">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Ibu Kandung</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ $dataPdb->nama_ibu }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tahun_lahir_ibu" class="col-sm-2 col-form-label">Tahun Lahir</label>
                        <div class="col-sm-10">
                            <input name="tahun_lahir_ibu" type="text" id="tahun_lahir_ibu" class="dateYear form-control" value="{{ old('tahun_lahir_ibu', $dataPdb->tahun_lahir_ibu) }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pendidikan_ibu" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-select" required>
                                <option value="{{ $dataPdb->pendidikan_ibu }}" hidden selected>{{ $dataPdb->pendidikan_ibu }}</option>
                                <option value="" disabled>Pilih Pendidikan ...</option>
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
                                <option value="{{ $dataPdb->berkebutuhan_khusus_ibu }}" hidden selected>{{ $dataPdb->berkebutuhan_khusus_ibu }}</option>
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
                                <option value="{{ $dataPdb->pekerjaan_ibu }}" hidden selected>{{ $dataPdb->pekerjaan_ibu }}</option>
                                <option value="" disabled>Pilih Pekerjaan ...</option>
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
                                <option value="{{ $dataPdb->penghasilan_ibu }}" hidden selected>{{ $dataPdb->penghasilan_ibu }}</option>
                                <option value="" disabled>Pilih Penghasilan Perbulan ...</option>
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
                
                {{-- Data Wali --}}
                <div class="border rounded p-3 position-relative mb-4">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Data Wali</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="nama_wali" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_wali" id="nama_wali" class="form-control" value="{{ old('nama_wali', $dataPdb->nama_wali) }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="tahun_lahir_wali" class="col-sm-2 col-form-label">Tahun Lahir</label>
                        <div class="col-sm-10">
                            <input name="tahun_lahir_wali" type="text" id="tahun_lahir_wali" class="dateYear form-control" value="{{ old('tahun_lahir_wali', $dataPdb->tahun_lahir_wali) }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="pendidikan_wali" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select name="pendidikan_wali" id="pendidikan_wali" class="form-select">
                                <option value="{{ $dataPdb->pendidikan_wali }}" hidden selected>{{ $dataPdb->pendidikan_wali }}</option>
                                <option value="" disabled>Pilih Pendidikan ...</option>
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
                                <option value="{{ $dataPdb->pekerjaan_wali }}" hidden selected>{{ $dataPdb->pekerjaan_wali }}</option>
                                <option value="" disabled>Pilih Pekerjaan ...</option>
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
                                <option value="{{ $dataPdb->penghasilan_wali }}" hidden selected>{{ $dataPdb->penghasilan_wali }}</option>
                                <option value="" disabled>Pilih Penghasilan Perbulan ...</option>
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
                
                {{-- Berkas --}}
                <div class="border rounded p-3 position-relative mb-4">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Berkas</h5>
                    <div class="mb-2 mt-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $dataPdb->email }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $dataPdb->no_hp }}" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="file" name="kartu_keluarga" id="formFile" class="form-control" {{ $dataPdb->kartu_keluarga ? '' : 'required' }}>
                            <a href="{{ asset('storage/'.$dataPdb->kartu_keluarga) }}" target="_blank">
                                <img 
                                    id="imagePreview" 
                                    src="{{ asset('storage/'.$dataPdb->kartu_keluarga) }}" 
                                    alt="Image Preview" 
                                    style="{{ $dataPdb->kartu_keluarga ? '' : 'display:none;' }}; margin-top:10px; max-width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">Akta Kelahiran</label>
                        <div class="col-sm-10">
                            <input type="file" name="akta_kelahiran" id="formFile" class="form-control" {{ $dataPdb->akta_kelahiran }}>
                            <a href="{{ asset('storage/'.$dataPdb->akta_kelahiran) }}" target="_blank">
                                <img 
                                    id="imagePreview" 
                                    src="{{ asset('storage/'.$dataPdb->akta_kelahiran) }}" 
                                    alt="Image Preview" 
                                    style="{{ $dataPdb->akta_kelahiran ? '' : 'display:none;' }}; margin-top:10px; max-width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Ayah</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_ayah" id="formFile" class="form-control">
                            <a href="{{ asset('storage/'.$dataPdb->ktp_ayah) }}" target="_blank">
                                <img 
                                    id="imagePreview" 
                                    src="{{ asset('storage/'.$dataPdb->ktp_ayah) }}" 
                                    alt="Image Preview" 
                                    style="{{ $dataPdb->ktp_ayah ? '' : 'display:none;' }}; margin-top:10px; max-width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Ibu</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_ibu" id="formFile" class="form-control">
                            <a href="{{ asset('storage/'.$dataPdb->ktp_ibu) }}" target="_blank">
                                <img 
                                    id="imagePreview" 
                                    src="{{ asset('storage/'.$dataPdb->ktp_ibu) }}" 
                                    alt="Image Preview" 
                                    style="{{ $dataPdb->ktp_ibu ? '' : 'display:none;' }}; margin-top:10px; max-width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formFile" class="col-sm-2 col-form-label">KTP Wali</label>
                        <div class="col-sm-10">
                            <input type="file" name="ktp_wali" id="formFile" class="form-control">
                            <a href="{{ asset('storage/'.$dataPdb->ktp_wali) }}" target="_blank">
                                <img 
                                    id="imagePreview" 
                                    src="{{ asset('storage/'.$dataPdb->ktp_wali) }}" 
                                    alt="Image Preview" 
                                    style="{{ $dataPdb->ktp_wali ? '' : 'display:none;' }}; margin-top:10px; max-width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                </div>
                
                {{-- Status Pendaftaran --}}
                <div class="border rounded p-3 position-relative">
                    <h5 class="position-absolute top-0 start-0 translate-middle-y ms-4 bg-white">Status Pendaftaran</h5>
                    <div class="mb-2 row">
                        <label for="status_formulir" class="col-sm-2 col-form-label">Status Formulir</label>
                        <div class="col-sm-10">
                            <select name="status_formulir" id="status_formulir" class="form-select" required @disabled($dataPdb->status_formulir != 'Diperiksa')>
                                <option value="{{ $dataPdb->status_formulir }}" hidden selected>{{ $dataPdb->status_formulir }}</option>
                                <option value="" disabled>Pilih Status Pendaftaran</option>
                                <option value="Diperiksa">Diperiksa</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                            <span class="text-danger">* Diperiksa kembali sebelum mengubah status formulir, karena status tidak dapat diubah ketika status "Diterima" atau "Ditolak</span>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="status_registrasi" class="col-sm-2 col-form-label">Status Registrasi</label>
                        <div class="col-sm-10">
                            <select name="status_registrasi" id="status_registrasi" class="form-select" required @disabled($dataPdb->status_registrasi != 'Menunggu')>
                                <option value="{{ $dataPdb->status_registrasi }}" hidden selected>{{ $dataPdb->status_registrasi }}</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batal</option>
                            </select>
                            @if ($dataPdb->status_registrasi === '-')
                                <input type="hidden" name="status_registrasi" id="status_registrasi_hidden" value="{{ $dataPdb->status_registrasi }}">
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <textarea name="catatan" id="catatan" rows="3" class="form-control">{{ old('catatan', $dataPdb->catatan) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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

{{-- Priview Gambar --}}
<script>
    document.getElementById('formFile').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const imgPreview = document.getElementById('imagePreview');
          imgPreview.src = e.target.result;
          imgPreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
      }
    });
</script>

{{-- Tidak Berpenghasilan --}}
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
    handlePekerjaanChange('pekerjaan_wali', 'penghasilan_wali')
</script>

{{-- Status Registrasi --}}
<script>
    function handleStatusRegisChange(statusFormulirId, statusRegistrasiId, hiddenInputId) {
        const statusFormulirSelect = document.getElementById(statusFormulirId);
        const statusRegistrasiSelect = document.getElementById(statusRegistrasiId);
        const statusRegistrasiHidden = document.getElementById(hiddenInputId);
        
        statusFormulirSelect.addEventListener('change', function() {
            let newValue = '-';
            if (statusFormulirSelect.value === 'Diterima') {
                newValue = 'Menunggu';
            } else if (statusFormulirSelect.value === 'Ditolak') {
                newValue = 'Batal';
            }

            statusRegistrasiSelect.value = newValue;
            statusRegistrasiHidden.value = newValue;
        });
    }
    
    handleStatusRegisChange('status_formulir', 'status_registrasi', 'status_registrasi_hidden');
</script>
@endpush