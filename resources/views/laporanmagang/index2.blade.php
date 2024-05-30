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
                    <h1>Dokumen Magang</h1>
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
                                <a href="{{ route('laporanmagang.create') }}" class="btn btn-sm btn-success"><i
                                        class="fas fa-plus-circle"></i> Tambah Dokumen</a>
                            </div>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-main" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Judul Dokumen Magang</th>
                                        <th>File Magang</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coba as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->magang_judul }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $item->file_magang) }}"
                                                        target="_blank">{{ $item->file_magang }}</a>
                                                </td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-block btn-sm btn-outline-info"
                                                        data-toggle="dropdown"><i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('laporanmagang.show', ['logbook_magang' => $index->logbook_id]) }}">Detail</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('laporanmagang.edit', ['logbook_magang' => $index->logbook_id]) }}">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('laporanmagang.destroy', $index->logbook_id) }}">
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
