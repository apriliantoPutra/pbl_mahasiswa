@extends('layouts.app')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>{{ $name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ route('logbook-magang.create') }}" class="btn btn-sm btn-success"><i
                                        class="fas fa-plus-circle"></i> Tambah LogBook</a>
                            </div>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-main" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari/tanggal</th>
                                            <th>Jam Kerja</th>
                                            <th>Aktivitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logbook_magangs as $index)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <?php
                                                $hari = date('l', strtotime($index->tgl_kegiatan)); // Get day name
                                                $tanggal = date('d-m-Y', strtotime($index->tgl_kegiatan)); // Format date
                                                ?>
                                                <td><?php echo "$hari, $tanggal"; ?></td>
                                                <td>{{ $index->jam }}</td>
                                                <td>{{ $index->kegiatan }}</td>
                                                {{-- <td><a href="{{ route('view_pdf', ['logbook_id' => $index->logbook_id]) }}">Lihat Dokumen</a></td> --}}
                                                <td>
                                                    <button type="button" class="btn btn-block btn-sm btn-outline-info"
                                                        data-toggle="dropdown"><i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('logbook-magang.show', ['logbook_magang' => $index->logbook_id]) }}">Detail</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('logbook-magang.edit', ['logbook_magang' => $index->logbook_id]) }}">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('logbook-magang.destroy', $index->logbook_id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item confirm-button" href="#">Hapus</a>
                                                        </form>
                                                    </div>
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
        </div>
    </div>
@endsection
