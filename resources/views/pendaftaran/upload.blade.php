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

    .container1 {
        width: 600px;
        justify-content: center;
        height: 300px;
        margin: 0 auto; /* Mengatur posisi ke tengah */
        padding: 20px;
        border: 1px solid #ccc;
        border-top: 5px solid #020238;
        background-color: rgba(231, 230, 246, 1);
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding-left: 20px; /* Untuk memberikan sedikit padding di sebelah kiri judul */
        margin-bottom: 20px; /* Untuk memberikan jarak antara judul dan form */
    }

    .form-judul {
        margin-bottom: 20px; /* Untuk memberikan jarak antara judul form dan input */
    }

    .button-container {
        text-align: center;
        margin-top: 70px;
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

    .popup1 {
        text-align: center;
        margin-top: 50px;
    }

    .popup1-buttonpopup .btn {
        background-color: #020238; /* Blue background color */
        color: white; /* White font color */
    }

    .popup1 .buttonpopup .btn:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }


    .lingkaran {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 20px;
    }

    .isi1 {
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
    h1 {
        font-size: 25px;
        margin-top: -5px;
    }

    h2 {
        font-weight: bold; /* Membuat teks judul h2 menjadi tebal (bold) */
        margin-top: 25px;
    }
    .popup{
        background-color: #020238;
        width: 600px;
        height: 300px;
        color: white;
        font-size: 20px;
        justify-content: center;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-top: 5px solid #020238;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding-left: 20px;
        margin-bottom: 20px;

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
        <div class="container1">
            <h2>Anda Yakin Ingin melakukan Upload!</h2>
            <br>
            <br>
            <h1>Periksa lagi biodata dan data industri Anda!</h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLabel" style="text-align: center;">Jawaban Anda sudah terkirim</h2>
      <style>
        margin-top:200px;
      </style>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br>
        <p>Tolong tunggu persetujuan magang dari industri,</p>
        <p>hasilnya akan dikirim melalui email peserta.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            <div class="button-container">
                <button onclick="window.location.href='{{ route('daftar-magang.dataindustri') }}'" type="button" class="btn btn-success">Kembali</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Lanjut</button>

            </div>




    </div>
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
@endsection
