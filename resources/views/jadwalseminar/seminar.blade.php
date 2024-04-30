@extends('layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /* Add border to card-header */
    .card-header {
        border-top: 5px solid #020238;
        background-color: #fff; /* Background color */
    }
    .card-body {
        padding: 20px;
    }
    .card-body p {
        margin-bottom: 10px;
        font-size: 16px;
    }
    .table {
        width: 100%;
        margin-bottom: 0;
    }
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table th {
        background-color: #f8f9fa; /* Table header background color */
        border-color: #dee2e6;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-secondary {
        background-color: #6c757d; /* Button background color */
        border-color: #6c757d; /* Button border color */
        color: #ffffff; /* Button text color */
        font-size: 16px;
        padding: 10px 20px;
        margin-top: 20px;
    }
    .btn-secondary:hover {
        background-color: #5a6268; /* Button background color on hover */
        border-color: #545b62; /* Button border color on hover */
    }
</style>
@endpush

<div class="container mt-3">
    <h3 class="mb-4"><b>Jadwal Seminar</b></h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            @foreach($seminar_magangs as $index)
                            <p><strong>Nama:</strong> {{ $index->nama_id }}</p>
                            <p><strong>Nim:</strong> {{ $index->mhs_nim }}</p>
                            <p><strong>Penguji:</strong> {{ $index->dosen_nama }}</p>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach($seminar_magangs as $index)
                            <?php
                                $hari = date('l', strtotime($index->tgl_seminar)); // Get day name
                                $tanggal = date('d-m-Y', strtotime($index->tgl_seminar)); // Format date
                            ?>
                            <p><strong>Jadwal:</strong> <?php echo "$hari, $tanggal"; ?></p>
                            <p><strong>Jam:</strong> {{ $index->jam }}</p>
                            <p><strong>Ruangan:</strong> {{ $index->ruangan }}</p>
                            <p><strong>Link Zoom:</strong>---</p>
                            <p><strong>Catatan:</strong>{{ $index->catatan }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
