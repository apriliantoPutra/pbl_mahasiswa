@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .judul {
            text-align: left;
            padding-left: 20px;
            /* Untuk memberikan sedikit padding di sebelah kiri judul */
            margin-bottom: 20px;
            /* Untuk memberikan jarak antara judul dan form */
        }

        .container {
            width: 100%;
            margin-left: 0 auto;
            /* Mengatur margin menjadi 0 auto untuk mengatur posisi ke tengah */
            padding: 20px;
            border: 1px solid #ccc;
            border-top: 5px solid #020238;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-judul {
            margin-bottom: 20px;
            /* Untuk memberikan jarak antara judul form dan input */
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
            background-color: rgba(2, 2, 56, 1);
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
            background-color: rgba(216, 216, 216, 1);
            color: white;
            border-radius: 50%;
            /* Untuk membuat lingkaran */
            width: 50px;
            /* Ukuran diameter lingkaran */
            height: 50px;
            /* Ukuran diameter lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            /* Ubah margin-left sesuai kebutuhan */
            font-size: 30px;
        }

        .isi2 {
            background-color: #020238;
            color: white;
            border-radius: 50%;
            /* Untuk membuat lingkaran */
            width: 50px;
            /* Ukuran diameter lingkaran */
            height: 50px;
            /* Ukuran diameter lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            /* Ubah margin-left sesuai kebutuhan */
            font-size: 30px;
        }

        .isi3 {
            background-color: rgba(216, 216, 216, 1);
            color: white;
            border-radius: 50%;
            /* Untuk membuat lingkaran */
            width: 50px;
            /* Ukuran diameter lingkaran */
            height: 50px;
            /* Ukuran diameter lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            /* Ubah margin-left sesuai kebutuhan */
            font-size: 30px;
        }

        h4 {
            font-size: 30px;
            margin-top: 25px;
            margin-left: 10px;
        }
    </style>
    </head>

    <body>
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
            <div class="form-judul">
                <h5>Form Pendaftaran</h5>
            </div>

            <form action="{{ route('daftar-magang.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="nama">Nama Industri:</label>
                <select id="nama" name="nama" class="input" required>
                    <option value="">Pilih Nama Industri</option>
                    {{-- @if ($industriid) --}}
                        @foreach ($data as $industri)
                            <option value="{{ $industri->nama_industri }}">{{ $industri->nama_industri }}</option>
                        @endforeach
                    {{-- @endif --}}
                </select>

                <label for="nim">Bidang Industri:</label>
                <select id="bidang" name="bidang" class="input" required>
                    <option value="">Pilih Bidang Industri</option>
                    @foreach ($data as $industri)
                        <option value="{{ $industri->bidang }}">{{ $industri->bidang }}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control datepicker"
                        placeholder="Pilih Tanggal Mulai">
                </div>

                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control datepicker"
                        placeholder="Pilih Tanggal Selesai">
                </div>

                @error('tgl_mulai')
                    <div class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                @error('tgl_selesai')
                    <div class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary">Klik</button>
            </form>

        </div>

        </div>

        <script>
            $(document).ready(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd' // Format tanggal YYYY-MM-DD
                });
            });
        </script>
        {{-- <div class="button-container">
            <button onclick="window.location.href='{{ route('daftar-magang.index') }}'" type="button"
                class="btn btn-success">Kembali</button>
            <button onclick="window.location.href='{{ route('daftar-magang.upload') }}'" type="button"
                class="btn btn-success">Selanjutnya</button>
        </div> --}}
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil nilai tanggal dari formulir
            $tanggal = $_POST['tanggal'];

            // Tampilkan tanggal yang diinputkan
            echo 'Tanggal yang diinputkan: ' . $tanggal;
        }
        ?>
        </form>
        </div>
    @endsection
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr('.datepicker', {
                dateFormat: 'Y-m-d', // Format tanggal YYYY-MM-DD
                enableTime: false, // Nonaktifkan pilihan waktu
                altInput: true, // Gunakan input alternatif untuk tampilan yang lebih baik
                altFormat: 'd/m/Y', // Format alternatif untuk tampilan input
            });
        </script>
    @endpush
