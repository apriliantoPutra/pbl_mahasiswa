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
    <h3 class="mb-4"><b>Detail Laporan Magang</b></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                                <tr>
                                    <th>Judul Laporan Magang</th>
                                    <td>{{ $laporanmagang->magang_judul }}</td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>{{ $laporanmagang->file_magang }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Upload</th>
                                    <td>{{ $laporanmagang->created_at->format('d/m/Y H:i:s') }}</td> <!-- Change format here -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
