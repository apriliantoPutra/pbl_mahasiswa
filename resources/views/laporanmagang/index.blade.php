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
                        <a href="{{ url('/laporanmagang/create') }}" class="btn btn-success float-right"
                            title="Tambah Laporan Magang">
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
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coba as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->magang_judul }}</td>
                                            {{-- <td>
                                                <a href="file/{{ $item->file }}"  download="{{ $item->file }}">
                                                 targ
                                                </a>
                                            </td> --}}
                                            <td>
                                                <a href="{{ asset('storage/' . $item->file_magang) }}"
                                                    target="_blank">{{ $item->file_magang }}</a>
                                            </td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#confirmDeleteModal-{{ $item->laporan_id }}">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="confirmDeleteModal-{{ $item->laporan_id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="confirmDeleteModalLabel-{{ $item->laporan_id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $item->laporan_id }}">
                                                                    Konfirmasi Hapus
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus laporan ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <form method="POST" action="{{ url('/laporanmagang/' . $item->laporan_id) }}"
                                                                      id="delete-form-{{ $item->laporan_id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
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
