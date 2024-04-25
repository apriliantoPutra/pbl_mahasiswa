@extends('layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /* Tambahkan border pada card */
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
                    <h5 class="card-title m-0"></h5>
                    <div class="card-tools">
                        <a href="{{ route('laporanmagang.index') }}" class="btn btn-tool"><i class="fas fa-arrow-alt-circle-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('laporanmagang/' .$laporanmagang->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$laporanmagang->id}}">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" value="{{$laporanmagang->judul}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" id="file" value="{{$laporanmagang->file}}" class="form-control">
                        </div>
                        <hr>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
