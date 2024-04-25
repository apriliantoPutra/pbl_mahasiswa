@extends('layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /* Tambahkan border pada card-header */
    .card-header{
        border-top: 5px solid #020238;
        background-color: #fff; /* Tambahkan warna latar belakang */
    }
</style>
@endpush

<div class="container mt-3">
    <h3 class="mb-4"><b>Daftar Laporan Magang</b></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- Card Header Content Goes Here -->
                </div>
                <div class="card-body">
                    <!-- Card Body Content Goes Here -->
                    <div class="card-body">
                        <p><strong>Judul Laporan Magang:</strong> {{ $laporanmagang->judul }}</p>
                        <p><strong>File:</strong> {{ $laporanmagang->file }}</p>
                        <p><strong>Tanggal Upload:</strong> {{ $laporanmagang->created_at }}</p>
                    </div>
                    <hr>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
