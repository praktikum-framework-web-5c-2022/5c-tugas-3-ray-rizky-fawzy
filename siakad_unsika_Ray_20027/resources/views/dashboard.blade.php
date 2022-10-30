@extends('main')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <h1>
        Dashboard
    </h1>
    <h4>Selamat datang di halaman <a href="/" style="text-decoration: none">SIAKAD</a></h4>
    <div class="row justify-content-between">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Dosen
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah dosen</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $dosen }} Dosen</h6>
              <a href="/dosen" class="btn btn-primary">Lihat details</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Mahasiswa
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah Mahasiswa</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $mahasiswa }} Mahasiswa</h6>
              <a href="/mahasiswa" class="btn btn-primary">Lihat details</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Matakuliah
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah Matakuliah</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $matakuliah }} Matakuliah</h6>
              <a href="/matkul" class="btn btn-primary">Lihat details</a>
            </div>
        </div>
    </div>
</div>
@endsection
