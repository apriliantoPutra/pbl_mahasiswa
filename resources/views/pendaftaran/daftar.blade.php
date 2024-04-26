@extends('layouts.app')

@section('content')
<style>
    .judul {
        text-align: left;
        padding-left: 20px; /* Untuk memberikan sedikit padding di sebelah kiri judul */
        margin-bottom: 20px; /* Untuk memberikan jarak antara judul dan form */
    }

    .container {
        width: 100%;
        margin-left: 0 auto; /* Mengatur margin menjadi 0 auto untuk mengatur posisi ke tengah */
        padding: 20px;
        border: 1px solid #ccc;
        border-top: 5px solid #020238;
        background-color: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .button-container {
        text-align: left;
        margin-top: 20px;
    }

    .button-container .btn {
        margin-right: 10px;
        background-color: rgba(48, 154, 71, 0.74);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #218838;
    }

</style>
<div class="judul">
    <h4>Pendaftaran</h4>
</div>

<div class="container">
    <div class="button-container">
        <button onclick="window.location.href='{{ route('daftar-magang.biodata') }}'" type="button" class="btn btn-success">Daftar Magang</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Industri</th>
                <th scope="col">Alamat</th>
                <th scope="col">Posisi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel disini -->
        </tbody>
    </table>
</div>

@endsection
