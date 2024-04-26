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

    .form-judul {
        margin-bottom: 20px; /* Untuk memberikan jarak antara judul form dan input */
    }

    .label {
        display: block;
        margin-bottom: 5px;
    }

    .input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .button-container .btn {
        margin-right: 10px;
        background-color:rgba(2, 2, 56, 1);
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
        background-color: #020238;
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

</style>
</head>
<body>
    <div class="judul">
        <h4>Pendaftaran</h4>
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
        <div class="form-judul">
            <h5>Form Pendaftaran</h5>
        </div>

        <form id="form">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" class="input" required>

            <label for="nim">NIM:</label>
            <input type="number" id="nim" name="nim" class="input" required>

            <label for="universitas">Universitas:</label>
            <input type="text" id="universitas" name="universitas" class="input" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" class="input" required>

            <label for="prodi">Prodi:</label>
            <input type="text" id="prodi" name="prodi" class="input" required>

            <label for="semester">Semester:</label>
            <input type="number" id="semester" name="semester" class="input" min="1" max="8" required>

            <div class="button-container">
                <button onclick="window.location.href='{{ route('daftar-magang.index') }}'" type="button" class="btn btn-success">Kembali</button>
                <button onclick="window.location.href='{{ route('daftar-magang.dataindustri') }}'" type="button" class="btn btn-success">Selanjutnya</button>
            </div>
        </form>
    </div>
@endsection
