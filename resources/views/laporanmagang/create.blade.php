@extends('layouts.app')
@section('content')
    @push('css')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            /* Tambahkan border pada card */
            .card-header {
                border-top: 5px solid #020238;
                background-color: #fff;
                /* Tambahkan warna latar belakang */
            }
        </style>
    @endpush

    <div class="container mt-3">
        <h3 class="mb-4"><b>Daftar Laporan Magang</b></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0"></h5>
                        <div class="card-tools">
                            <a href="{{ route('laporanmagang.index') }}" class="btn btn-tool"><i
                                    class="fas fa-arrow-alt-circle-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('laporanmagang') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="mb-3">
                                <label for="jenis_dokumen" class="form-label">Jenis Dokumen</label>
                                <select class="form-select" name="jenis_dokumen" aria-label="Default select example">
                                    <option selected>Pilih Jenis Dokumen</option>
                                    <option value="1">Proposal</option>
                                    <option value="2">Laporan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="magang_judul" class="form-label">Judul Dokumen Magang</label>
                                <input type="text" name="magang_judul" id="magang_judul" class="form-control" placeholder="Masukkan judul dokumen">
                            </div>

                            <div class="mb-3">
                                <label for="file_magang" class="form-label">File</label>
                                <input type="file" name="file_magang" id="file_magang" class="form-control">
                            </div>

                            <a href="{{ route('laporanmagang.index') }}" class="btn btn-secondary">Close</a>
                            <input type="submit" value="Save" class="btn btn-success"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
