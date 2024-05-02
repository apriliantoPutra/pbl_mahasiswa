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
    margin-right: auto; /* Mengatur agar elemen span fleksibel dan mengisi ruang yang tersedia */
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
        <h3 class="mb-4"><b>Daftar Laporan Magang</b></h3>
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
                                        <th>Judul Laporan Magang</th>
                                        <th>File Magang</th>
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($laporanmagang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        {{-- <td>
                                                <a href="file/{{ $item->file }}"  download="{{ $item->file }}">
                                                 targ
                                                </a>
                                            </td> --}}
                                            <td>
                                                <a href="{{ asset('storage/' . $item->file) }}"
                                                    target="_blank">{{ $item->file}}</a>
                                            </td>
                                        <td>{{ $item->created_at->format('d/m/Y H:i:s')  }}</td>
                                        <td>
    <div class="dropdown">
    <button type="button" class="btn btn-block btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" style="border-color: #020238;">
    <i class="fas fa-cog"></i>
</button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ url('/laporanmagang/' . $item->id) }}" title="Lihat Laporan">Detail</a>
            <a class="dropdown-item" href="{{ url('/laporanmagang/' . $item->id . '/edit') }}" title="Edit Laporan">Edit</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmDeleteModal-{{ $item->id }}">
                 Hapus
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel-{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $item->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus laporan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ url('/laporanmagang/' . $item->id) }}" id="delete-form-{{ $item->id }}">
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
