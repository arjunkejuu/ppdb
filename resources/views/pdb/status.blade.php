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
                                <th scope="col" class="col-1">#</th>
                                <th scope="col" class="col-4">Nama PDB</th>
                                <th scope="col" class="col-4">Orang Tua</th>
                                <th scope="col" class="col-3">Status Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider align-middle">
                            @foreach($results as $index => $result)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $result->nama_pdb }}</td>
                                    <td>{{ $result->nama_ibu }}</td>
                                    <td>
                                        @php
                                            $buttonStatus = 'btn btn-sm ';
                                            if ($result->status_pendaftaran === 'Sedang Diperiksa') {
                                                $buttonStatus .= 'btn-warning';
                                            } elseif ($result->status_pendaftaran === 'Ditolak') {
                                                $buttonStatus .= 'btn-danger';
                                            } elseif ($result->status_pendaftaran === 'Diterima') {
                                                $buttonStatus .= 'btn-success';
                                            } else {
                                                $buttonClass .= 'btn-default';
                                            }
                                        @endphp
                                        <button class="{{ $buttonStatus }}" disabled="disabled">{{ $result->status_pendaftaran }}</button>
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