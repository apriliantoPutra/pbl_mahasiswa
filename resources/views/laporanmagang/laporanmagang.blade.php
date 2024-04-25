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
    </style>

    <div class="container mt-3">
        <h3><b>Laporan Magang</b></h3>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalLaporanTambah">
                            + Upload Laporan Magang
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Judul Laporan Magang</th>
                                        <th>File Magang</th>
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan_magangs as $index => $laporan_magang)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $laporan_magang['nama'] }}</td>
                                            <td>{{ $laporan_magang['nim'] }}</td>
                                            <td>{{ $laporan_magang['judul'] }}</td>
                                            <td>{{ $laporan_magang['file'] }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalLaporanEdit{{ $laporan_magang['id'] }}">
                                                    <i class="fas fa-edit"></i> 
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus{{ $laporan_magang['id'] }}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalLaporanEdit{{ $laporan_magang['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalLaporanEditLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLaporanEditLabel">Form Edit Laporan Magang</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="formlaporanedit" id="formlaporanedit" action="/manage-laporanmagang-magang/edit/{{ $laporan_magang['id'] }} " method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group row">
                                                                <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $laporan_magang['name'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nim" class="col-sm-4 col-form-label">Nim</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="nim" name="laporan_id" value="{{ $laporan_magang['nim'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="judul" class="col-sm-4 col-form-label">Judul Laporan Magang</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $laporan_magang['judul'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="file" class="col-sm-4 col-form-label">File Laporan Magang</label>
                                                                <div class="col-sm-8">
                                                                    <input type="file" class="form-control" id="file" name="file" value="{{ $laporan_magang['file'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="laporantambah" class="btn btn-success">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="ModalHapus{{ $laporan_magang['laporan_id'] }}" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus laporan ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="/manage-laporanmagang-magang/hapus/{{ $laporan_magang['laporan_id'] }}" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection
