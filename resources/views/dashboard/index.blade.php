@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Tabel Formulir Pendaftaran --}}
        <div class="row mb-3">
            <div class="p-5 bg-white rounded">
                <h2>Formulir Pendaftaran</h2>
                <button class="btn btn-sm btn-info mb-2" disabled>
                    {{ $jumlahForms }} Formulir
                </button>
                <div class="card bg-white border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Seluruh Formulir</button>
                            </li>   
                        </ul>
                    </div>
                    <div class="card-body tab-content" id="myTabContent">
                        {{-- Semua Formulir --}}
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <a href="{{ route('export.data') }}" class="btn border">
                                <i class="ri-download-line fs-5"></i>
                            </a>
                            <a href="{{ route('dashboard.daftar') }}" class="btn border">
                                <i class="ri-add-line fs-5"></i>
                            </a>
                            <table id="semua-form" class="display table table-striped table-fixed border-primary" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Formulir</th>
                                        <th>Status Registrasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-primary">
                                    @foreach($semuaForms as $semuaForm)
                                        <tr class="align-middle">
                                            <td>{{ $semuaForm->nama_pdb }}</td>
                                            <td>{{ \Carbon\Carbon::parse($semuaForm->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                @php
                                                    $buttonStatus = 'btn btn-sm ';
                                                    if ($semuaForm->status_formulir === 'Diperiksa') {
                                                        $buttonStatus .= 'btn-warning';
                                                    } elseif ($semuaForm->status_formulir === 'Ditolak') {
                                                        $buttonStatus .= 'btn-danger';
                                                    } elseif ($semuaForm->status_formulir === 'Diterima') {
                                                        $buttonStatus .= 'btn-success';
                                                    } else {
                                                        $buttonStatus .= 'btn-secondary';
                                                    }
                                                @endphp
                                                <button class="{{ $buttonStatus }}" disabled="disabled">{{ $semuaForm->status_formulir }}</button>
                                            </td>
                                            <td>
                                                @php
                                                    $buttonStatus = 'btn btn-sm ';
                                                    if ($semuaForm->status_registrasi === 'Menunggu') {
                                                        $buttonStatus .= 'btn-warning';
                                                    } elseif ($semuaForm->status_registrasi === 'Batal') {
                                                        $buttonStatus .= 'btn-danger';
                                                    } elseif ($semuaForm->status_registrasi === 'Selesai') {
                                                        $buttonStatus .= 'btn-success';
                                                    } else {
                                                        $buttonStatus .= 'btn-secondary';
                                                    }
                                                @endphp
                                                <button class="{{ $buttonStatus }}" disabled="disabled">{{ $semuaForm->status_registrasi }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $semuaForm->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                @if ($semuaForm->status_formulir != 'Ditolak')
                                                    <a href="{{ route('dashboard.edit', ['id_pdb' => $semuaForm->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                @endif
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $semuaForm->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Tabel Status Formulir --}}
        <div class="row mb-3">
            <div class="p-5 bg-white rounded">
                <h2>Status Formulir</h2>
                <button class="btn btn-sm btn-warning mb-2" disabled>
                    {{ $jmlDiperiksaPdbs }} Diperiksa
                </button>
                <button class="btn btn-sm btn-success mb-2" disabled>
                    {{ $jmlDiterimaPdbs }} Diterima
                </button>
                <button class="btn btn-sm btn-danger mb-2" disabled>
                    {{ $jmlDitolakPdbs }} Ditolak
                </button>
                <div class="card bg-white border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Diperiksa</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Diterima</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Ditolak</button>
                            </li>                    
                        </ul>
                    </div>
                    <div class="card-body tab-content" id="myTabContent">
                        {{-- Diperiksa --}}
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <a href="{{ route('export.data', ['status' => 'Diperiksa']) }}" class="btn border">
                                <i class="ri-download-line fs-5"></i>
                            </a>
                            <table id="diperiksa" class="display table table-striped table-fixed border-primary" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Pendaftaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-primary">
                                    @foreach($diperiksaPdbs as $diperiksaPdb)
                                        <tr class="align-middle">
                                            <td>{{ $diperiksaPdb->nama_pdb }}</td>
                                            <td>{{ $diperiksaPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($diperiksaPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" disabled="disabled">{{ $diperiksaPdb->status_formulir }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $diperiksaPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $diperiksaPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $diperiksaPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Diterima --}}
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <a href="{{ route('export.data', ['status' => 'Diterima']) }}" class="btn border">
                                <i class="ri-download-line fs-5"></i>
                            </a>
                            <table id="diterima" class="display table table-striped table-fixed border-primary" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Pendaftaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-primary">
                                    @foreach($diterimaPdbs as $diterimaPdb)
                                        <tr class="align-middle">
                                            <td>{{ $diterimaPdb->nama_pdb }}</td>
                                            <td>{{ $diterimaPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($diterimaPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" disabled="disabled">{{ $diterimaPdb->status_formulir }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $diterimaPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $diterimaPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $diterimaPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Ditolak --}}
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                            <a href="{{ route('export.data', ['status' => 'Ditolak']) }}" class="btn border">
                                <i class="ri-download-line fs-5"></i>
                            </a>
                            <table id="ditolak" class="display table table-striped table-fixed border-primary" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Pendaftaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-primary">
                                    @foreach($ditolakPdbs as $ditolakPdb)
                                        <tr class="align-middle">
                                            <td>{{ $ditolakPdb->nama_pdb }}</td>
                                            <td>{{ $ditolakPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ditolakPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" disabled="disabled">{{ $ditolakPdb->status_formulir }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $ditolakPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $ditolakPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $ditolakPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Table Registrasi --}}
        <div class="row">
            <div class="p-5 bg-white rounded">
                <h2>Status Registrasi</h2>
                <button class="btn btn-sm btn-warning mb-2" disabled>
                    {{ $jmlMenungguPdbs }} Menunggu
                </button>
                <button class="btn btn-sm btn-success mb-2" disabled>
                    {{ $jmlSelesaiPdbs }} Selesai
                </button>
                <button class="btn btn-sm btn-danger mb-2" disabled>
                    {{ $jmlBatalPdbs }} Batal
                </button>
                <div class="card bg-white border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing-tab-pane" type="button" role="tab" aria-controls="ongoing-tab-pane" aria-selected="true">
                                    Menunggu
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished-tab-pane" type="button" role="tab" aria-controls="finished-tab-pane" aria-selected="false">
                                    Selesai
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="canceled-tab" data-bs-toggle="tab" data-bs-target="#canceled-tab-pane" type="button" role="tab" aria-controls="canceled-tab-pane" aria-selected="false">
                                    Batal
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content" id="myTabContent">
                        {{-- Menunggu --}}
                        <div class="tab-pane fade show active" id="ongoing-tab-pane" role="tabpanel" aria-labelledby="ongoing-tab" tabindex="0">
                            <table id="ongoing" class="display table table-striped table-fixed border-primary">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Registrasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-primary">
                                    @foreach($menungguPdbs as $menungguPdb)
                                        <tr class="align-middle">
                                            <td>{{ $menungguPdb->nama_pdb }}</td>
                                            <td>{{ $menungguPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($menungguPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" disabled="disabled">{{ $menungguPdb->status_registrasi }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $menungguPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $menungguPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $menungguPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Selesai --}}
                        <div class="tab-pane fade" id="finished-tab-pane" role="tabpanel" aria-labelledby="finished-tab" tabindex="0">
                            <table id="finished" class="display table table-striped table-fixed border-primary">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Registrasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-devider border-primary">
                                    @foreach($selesaiPdbs as $selesaiPdb)
                                        <tr class="align-middle">
                                            <td>{{ $selesaiPdb->nama_pdb }}</td>
                                            <td>{{ $selesaiPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($selesaiPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" disabled="disabled">{{ $selesaiPdb->status_registrasi }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $selesaiPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $selesaiPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $selesaiPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Batal --}}
                        <div class="tab-pane fade" id="canceled-tab-pane" role="tabpanel" aria-labelledby="canceled-tab" tabindex="0">
                            <table id="canceled" class="displat table table-striped table-fixed border-primary">
                                <thead>
                                    <tr>
                                        <th>Nama PDB</th>
                                        <th>Orang Tua</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Registrasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-devider border-primary">
                                    @foreach($batalPdbs as $batalPdb)
                                        <tr class="align-middle">
                                            <td>{{ $batalPdb->nama_pdb }}</td>
                                            <td>{{ $batalPdb->nama_ibu }}</td>
                                            <td>{{ \Carbon\Carbon::parse($batalPdb->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" disabled="disabled">{{ $batalPdb->status_registrasi }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.detail', ['id_pdb' => $batalPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                                <a href="{{ route('dashboard.edit', ['id_pdb' => $batalPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                                <form action="{{ route('dashboard.delete', ['id_pdb' => $batalPdb->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="ri-delete-bin-line fs-5 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('successModal') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/plug-ins/2.1.3/sorting/date-uk.js"></script>

{{-- Modal Berhasil --}}
<script>
    $(document).ready(function(){
        @if(session('successModal'))
            $('#successModal').modal('show');
        @endif
    });
</script>

{{-- Tabel --}}
<script>
    const isMobile = window.innerWidth <= 768;
    
    function initializeDataTable(selector) {
        $(selector).DataTable({
            "order": [[3, 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ],
            "scrollX": isMobile,
            "responsive": true
        });
    }

    initializeDataTable('#semua-form');
    initializeDataTable('#diperiksa');
    initializeDataTable('#diterima');
    initializeDataTable('#ditolak');
    initializeDataTable('#ongoing');
    initializeDataTable('#finished');
    initializeDataTable('#canceled');
    
    window.addEventListener('resize', function() {
        $('#semua-form').DataTable().destroy();
        $('#diperiksa').DataTable().destroy();
        $('#diterima').DataTable().destroy();
        $('#ditolak').DataTable().destroy();
        $('#ongoing').DataTable().destroy();
        $('#finished').DataTable().destroy();
        $('#canceled').DataTable().destroy();

        initializeDataTable('#semua-form');
        initializeDataTable('#diperiksa');
        initializeDataTable('#diterima');
        initializeDataTable('#ditolak');
        initializeDataTable('#ongoing');
        initializeDataTable('#finished');
        initializeDataTable('#canceled');
    });
</script>
@endpush