@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-5 bg-white rounded">
        @csrf
        <form action="{{ route('status') }}" method="GET">
            <h3>Cari berdasarkan nama</h3>
            <div class="input-group mb-5">
                <input class="form-control" type="search" placeholder="Masukkan nama ..." name="query" value="{{ request('query') }}" id="">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        
        @if(isset($results))
            <h2>Status Pendaftaran PDB</h2>
            @if($results->isEmpty())
                <p>Nama siswa tidak ada yang cocok</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-fixed" style="width: 1200px">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1 text-center">#</th>
                                <th scope="col" class="col-2">Nama PDB</th>
                                <th scope="col" class="col-2">Orang Tua</th>
                                <th scope="col" class="col-1 text-center">Formulir</th>
                                <th scope="col" class="col-1 text-center">Registrasi</th>
                                <th scope="col" class="col-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider align-middle">
                            @foreach($results as $index => $result)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $result->nama_pdb }}</td>
                                    <td>{{ substr($result->nama_ibu, 0, 3) . str_repeat('*', strlen($result->nama_ibu) - 3) }}</td>
                                    <td class="text-center">
                                        @php
                                            $buttonStatusFormulir = 'btn btn-sm ';
                                            $status_formulir = 'ri-subtract-fill';
                                            if ($result->status_formulir === 'Diperiksa') {
                                                $buttonStatusFormulir .= 'btn-warning';
                                                $status_formulir = 'ri-time-line';
                                            } elseif ($result->status_formulir === 'Ditolak') {
                                                $buttonStatusFormulir .= 'btn-danger';
                                                $status_formulir = 'ri-close-line';
                                            } elseif ($result->status_formulir === 'Diterima') {
                                                $buttonStatusFormulir .= 'btn-success';
                                                $status_formulir = 'ri-check-line';
                                            } else {
                                                $buttonClass .= 'btn-default';
                                            }
                                        @endphp
                                        <button class="{{ $buttonStatusFormulir }}" disabled="disabled"><i class="{{ $status_formulir }}"></i></button>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $buttonStatusRegistrasi = 'btn btn-sm ';
                                            $status_registrasi = 'ri-subtract-fill';
                                            if ($result->status_registrasi === 'Menunggu') {
                                                $buttonStatusRegistrasi .= 'btn-warning';
                                                $status_registrasi = 'ri-time-line';
                                            } elseif ($result->status_registrasi === 'Selesai') {
                                                $buttonStatusRegistrasi .= 'btn-success';
                                                $status_registrasi = 'ri-check-line';
                                            } elseif ($result->status_registrasi === 'Batal') {
                                                $buttonStatusRegistrasi .= 'btn-danger';
                                                $status_registrasi = 'ri-close-line';
                                            } elseif ($result->status_formulir === 'Ditolak') {
                                                $buttonStatusRegistrasi .= 'btn-danger';
                                                $status_registrasi = 'ri-close-line';
                                            } else {
                                                $buttonStatusRegistrasi .= 'btn-secondary';
                                                $status_registrasi = 'ri-spam-3-line';
                                            }
                                        @endphp
                                        <button class="{{ $buttonStatusRegistrasi }}" disabled="disabled"><i class="{{ $status_registrasi }}"></i></button>
                                    </td>
                                    <td>
                                        @php
                                            $catatan = $result->keterangan ?? $result->status_formulir;
                                        @endphp
                                        <p>{{ $catatan }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="justify-content-center">
                        {{ $results->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection