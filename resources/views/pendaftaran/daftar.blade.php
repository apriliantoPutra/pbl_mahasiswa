@extends('layouts.app')

@section('content')
<style>
    .judul {
        text-align: left;
        padding-left: 20px; /* Untuk memberikan sedikit padding di sebelah kiri judul */
        margin-bottom: 20px; /* Untuk memberikan jarak antara judul dan form */
        border
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
    .lingkaran {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 20px;
    }

    .isi1 {
        background-color:  #020238;
        color: white;
        border-radius: 50%; /* Untuk membuat lingkaran */
        width: 50px; /* Ukuran diameter lingkaran */
        height: 50px; /* Ukuran diameter lingkaran */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 10px; /* Ubah margin-left sesuai kebutuhan */
        font-size: 30px;
    }

    .isi2 {
        background-color:rgba(216, 216, 216, 1);
        color: white;
        border-radius: 50%; /* Untuk membuat lingkaran */
        width: 50px; /* Ukuran diameter lingkaran */
        height: 50px; /* Ukuran diameter lingkaran */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 10px; /* Ubah margin-left sesuai kebutuhan */
        font-size: 30px;
    }

    .isi3 {
        background-color: rgba(216, 216, 216, 1);
        color: white;
        border-radius: 50%; /* Untuk membuat lingkaran */
        width: 50px; /* Ukuran diameter lingkaran */
        height: 50px; /* Ukuran diameter lingkaran */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 10px; /* Ubah margin-left sesuai kebutuhan */
        font-size: 30px;
    }
    h4 {
        font-size: 30px;
        margin-top: 25px;
        margin-left: 10px;
    }
</style>
<div class="judul">
    <h4><strong>
    Pendaftaran
    </strong></h4>
</div>

<div class="container">
        <div class="lingkaran">
            <div class="isi1">
                1
            </div>
            <div class="isi2">
                2
            </div>
            <div class="isi3">
                3
            </div>
        </div>
        <div class="button-container">
        <button onclick="window.location.href='{{ route('daftar-magang.dataindustri') }}'" type="button" class="btn btn-success">Daftar Magang</button>
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
