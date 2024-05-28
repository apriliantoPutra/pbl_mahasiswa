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
                    <h1>Data Mahasiswa</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Data Pribadi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>Nama: </p>
                                    <p>Nim: </p>
                                    <p>Tempat Magang: </p>
                                    <p>Tanggal Mulai: </p>
                                    <p>Tanggal Selesai: </p>
                                </div>
                                <div class="col-6">
                                    @foreach ($datamhs as $index)
                                    <p>{{ $index->nama_id }}</p>
                                    <p>{{ $index->mhs_nim }}</p>
                                    <p>{{ $index->nama_industri }}</p>
                                    <p>{{ $index->tgl_mulai }}</p>
                                    <p>{{ $index->tgl_selesai }}</p>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Data Pembimbing</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-6">
                                <p>Nama Dosen: </p>
                                <p>NIP Dosen: </p>

                            </div>
                            <div class="col-6">
                                Ada Isinya
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
