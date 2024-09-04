@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Seluruh Formulir</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sedang Diperiksa</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Diterima</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Ditolak</button>
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
                    <table id="semua-form" class="display table table-striped table-fixed" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Tanggal Daftar</th>
                                <th>Status Pendaftaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($semuaForms as $semuaForm)
                                <tr>
                                    <td>{{ $semuaForm->nama_pdb }}</td>
                                    <td>{{ $semuaForm->nama_ibu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($semuaForm->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        @php
                                            $buttonStatus = 'btn btn-sm ';
                                            if ($semuaForm->status_pendaftaran === 'Sedang Diperiksa') {
                                                $buttonStatus .= 'btn-warning';
                                            } elseif ($semuaForm->status_pendaftaran === 'Ditolak') {
                                                $buttonStatus .= 'btn-danger';
                                            } elseif ($semuaForm->status_pendaftaran === 'Diterima') {
                                                $buttonStatus .= 'btn-success';
                                            } else {
                                                $buttonClass .= 'btn-default';
                                            }
                                        @endphp
                                        <button class="{{ $buttonStatus }}" disabled="disabled">{{ $semuaForm->status_pendaftaran }}</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.detail', ['id_pdb' => $semuaForm->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                        <form action="{{ route('dashboard.delete', ['id_pdb' => $semuaForm->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="ri-delete-bin-line fs-5"></i>
                                            </button>
                                        </form>
                                        @if ($semuaForm->status_pendaftaran === 'Sedang Diperiksa')
                                            <a href="{{ route('dashboard.edit', ['id_pdb' => $semuaForm->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- Sedang Diperiksa --}}
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <a href="{{ route('export.data', ['status' => 'Sedang Diperiksa']) }}" class="btn border">
                        <i class="ri-download-line fs-5"></i>
                    </a>
                    <table id="diperiksa" class="display table table-striped table-fixed" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Tanggal Daftar</th>
                                <th>Status Pendaftaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($diperiksaPdbs as $diperiksaPdb)
                                <tr class="align-middle">
                                    <td>{{ $diperiksaPdb->nama_pdb }}</td>
                                    <td>{{ $diperiksaPdb->nama_ibu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($diperiksaPdb->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" disabled="disabled">{{ $diperiksaPdb->status_pendaftaran }}</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.detail', ['id_pdb' => $diperiksaPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                        <form action="{{ route('dashboard.delete', ['id_pdb' => $diperiksaPdb->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="ri-delete-bin-line fs-5"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('dashboard.edit', ['id_pdb' => $diperiksaPdb->id]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
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
                    <table id="diterima" class="display table table-striped table-fixed" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Tanggal Daftar</th>
                                <th>Status Pendaftaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($diterimaPdbs as $diterimaPdb)
                                <tr class="align-middle">
                                    <td>{{ $diterimaPdb->nama_pdb }}</td>
                                    <td>{{ $diterimaPdb->nama_ibu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($diterimaPdb->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" disabled="disabled">{{ $diterimaPdb->status_pendaftaran }}</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.detail', ['id_pdb' => $diterimaPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                        <form action="{{ route('dashboard.delete', ['id_pdb' => $diterimaPdb->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="ri-delete-bin-line fs-5"></i>
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
                    <table id="ditolak" class="display table table-striped table-fixed" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Tanggal Daftar</th>
                                <th>Status Pendaftaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($ditolakPdbs as $ditolakPdb)
                                <tr class="align-middle">
                                    <td>{{ $ditolakPdb->nama_pdb }}</td>
                                    <td>{{ $ditolakPdb->nama_ibu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ditolakPdb->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" disabled="disabled">{{ $ditolakPdb->status_pendaftaran }}</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.detail', ['id_pdb' => $ditolakPdb->id]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                        <form action="{{ route('dashboard.delete', ['id_pdb' => $ditolakPdb->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="ri-delete-bin-line fs-5"></i>
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

<script>
    $(document).ready(function(){
        $('#semua-form').DataTable({
            "order": [[3, 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
        
        $('#diperiksa').DataTable({
            "order": [[3, 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
        
        $('#diterima').DataTable({
            "order": [[3, 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
        
        $('#ditolak').DataTable({
            "order": [[3, 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
    });
</script>
@endpush