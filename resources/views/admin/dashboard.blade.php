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
                        <button class="nav-link bg-warning" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sedang Diperiksa</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link bg-success" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Diterima</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link bg-danger" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Ditolak</button>
                      </li>                    
                </ul>
            </div>
            <div class="card-body tab-content" id="myTabContent">
                {{-- Semua Formulir --}}
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <table id="semua-form" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Status Pendaftaran</th>
                                <th>Tanggal Daftar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($semuaForms as $semuaForm)
                                <tr class="align-middle">
                                    <td>{{ $semuaForm->nama_pdb }}</td>
                                    <td>{{ $semuaForm->nama_ibu }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" disabled="disabled">{{ $semuaForm->status_pendaftaran }}</button>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($semuaForm->tanggal_lahir)->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.detail', ['id_pdb' => $semuaForm->id_pdb]) }}" class="btn"><i class="ri-eye-line fs-5"></i></a>
                                        <a href="{{ route('admin.dashboard.edit', ['id_pdb' => $semuaForm->id_pdb]) }}" class="btn"><i class="ri-pencil-line fs-5"></i></a>
                                        <a href="#" class="btn"><i class="ri-delete-bin-line fs-5"></i></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- Sedang Diperiksa --}}
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <table id="diperiksa" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama PDB</th>
                                <th>Orang Tua</th>
                                <th>Status Pendaftaran</th>
                                <th>Tanggal Daftar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($diperiksaPdbs as $diperiksaPdb)
                                <tr class="align-middle">
                                    <td>{{ $diperiksaPdb->nama_pdb }}</td>
                                    <td>{{ $diperiksaPdb->nama_ibu }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" disabled="disabled">{{ $semuaForm->status_pendaftaran }}</button>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($diperiksaPdb->tanggal_lahir)->format('d/m/Y') }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.dashboard.data', $diperiksaPdb->id_pdb) }}" class="btn btn-sm view-btn"><i class="ri-eye-line fs-5"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- Diterima --}}
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                
                {{-- Ditolak --}}
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>              
            </div>
        </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/plug-ins/2.1.3/sorting/date-uk.js"></script>
<script>
    $(document).ready(function(){
        $('#semua-form').DataTable({
            "order": [['created_at', 'desc']],
            "scrollX": true,
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
        
        $('#diperiksa').DataTable({
            "order": [['created_at', 'desc']],
            "columnDefs": [
                {"orderable": false, "targets": 4},
                {type: "date-uk", "targets": 3}
            ]
        });
    });
</script>
@endpush