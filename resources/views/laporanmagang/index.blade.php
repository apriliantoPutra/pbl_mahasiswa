@extends('layouts.app')
@section('content')
    <style>
        .card {
            border-top: 5px solid #020238;
        }

        .table thead th {
            background-color: #020238;
            color: #ffffff;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }

        .pagination span {
            margin-right: auto;
            /* Mengatur agar elemen span fleksibel dan mengisi ruang yang tersedia */
            color: black;
        }

        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
        }

        .pagination a.active {
            background-color: #f0f0f0;
        }
    </style>

    <div class="container mt-3">
        <h3 class="mb-4"><b>Daftar Dokumen Magang</b></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/laporanmagang/create') }}" class="btn btn-success float-right" title="Tambah Laporan Magang">
                            <i class="fa fa-plus"></i> Laporan Magang
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Dokumen Magang</th>
                                        <th>File Magang</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coba as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->magang_judul }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->file_magang) }}" target="_blank">{{ $item->file_magang }}</a>
                                            </td>
                                            <td>
                                                @if($item->tipe == 1)
                                                    <span class="badge badge-success">Proposal</span>
                                                @else
                                                    <span class="badge badge-danger">Laporan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-block btn-sm btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('laporanmagang.edit', ['laporanmagang' => $item->laporan_id]) }}">Edit</a>
                                                        <form method="POST" action="{{ route('laporanmagang.destroy', $item->laporan_id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item confirm-button">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                <span>Showing 1 to 3 of 3 entries</span>
                                <a href="#" class="prev">Previous</a>
                                <a href="#" class="active">1</a>
                                <a href="#">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
