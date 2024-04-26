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
    .pagination {
    display: flex;
    justify-content: flex-end; 
    padding: 10px;
}

.pagination span {
    margin-right: auto; /* Mengatur agar elemen span fleksibel dan mengisi ruang yang tersedia */
    color: black;
}

.pagination a {
    padding: 5px 10px;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
}

.pagination a.active {
    background-color: #f0f0f0;
}
</style>

<div class="container mt-3">
    <h3><b>Penilaian Magang Mahasiswa</b></h3>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nilai_dosen }}</td>
                                        <td>{{ $item->nilai_industri }}</td>
                                        <td>{{ $item->nilai_akhir }}</td>
                                        <td>
    <div class="dropdown">
    <button type="button" class="btn btn-block btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" style="border-color: #020238;">
    <i class="fas fa-cog"></i>
</button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ url('/nilai/' . $item->id) }}" title="Lihat nilai">Detail</a>
</td></tr>
                                @endforeach
                                </tbody>
                        </table>
                        <div class="pagination">
            <span>Showing 1 to 3 of 3 entries</span>
            <a href="#" class="prev">Previous</a>
            <a href="#" class="active">1</a>
            <a href="#">Next</a>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
