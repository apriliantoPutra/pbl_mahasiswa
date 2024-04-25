@extends('layouts.app')
@section('content')
<style>
    .card {
        border-top: 5px solid #020238; /* Change the border color and weight as needed */
    }
    .table thead th {
        background-color: #020238;
        color: #ffffff; /* Optional: Set text color to white for better contrast */
    }
</style>

<div class="container mt-3">
    <h3><b>Penilaian Magang Mahasiswa</b></h3>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalNilaiTambah">
                            + Upload Laporan Magang
                        </button>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Dosen</th>
                                    <th>Nilai Industri</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
