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
</style>
@endpush

<div class="container mt-3">
    <h3 class="mb-4"><b>Nilai Magang</b></h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($nilai as $index)
                                <tr>
                                    <th>Nilai Dosen</th>
                                    <td>{{ $index->nilai_dosen }}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Industri</th>
                                    <td>{{ $index->nilai_industri }}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Akhir</th>
                                    <td>{{ $index->nilai_akhir }}</td> <!-- Change format here -->
                                </tr>
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
