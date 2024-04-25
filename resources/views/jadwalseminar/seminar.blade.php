@extends('layouts.app')

@section('content')
<style>
  .container {
    width: 90%;
    margin-left: 10px;
    padding: 20px;
  }
  h1{
    margin-bottom: 20px;
  }
  .table-responsive {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0px -5px 0px blue;
    border-radius: 3px;
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
<div class="container">
    <h1>Jadwal Seminar</h1>
    <div class="row mb-2">
        <div class="col-sm-6 text-uppercase">
            <div class="card-tools">
                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Tambah Jadwal Bimbingan</a>
            </div>
        </div>
        <div class="col-sm-6">
            <form action="#" method="GET" class="form-inline float-sm-right">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Jadwal</th>
                    <th>Tempat</th>
                    <th>Dosen Penguji</th>
                    <th>Status</th>
                </tr>
            </thead>
            
        </table>
        <div class="pagination">
            <span>Showing 1 to 3 of 3 entries</span>
            <a href="#" class="prev">Previous</a>
            <a href="#" class="active">1</a>
            <a href="#">Next</a>
        </div>
    </div>
</div>
@endsection
