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
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    
  
    @include('sweetalert::alert')
@endsection
