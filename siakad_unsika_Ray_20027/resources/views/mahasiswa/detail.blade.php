@extends('main')
@section('title', 'Details Mahasiswa')
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="250px" height="250px">
        <div class="card-body">
            <div class="card-header">
                {{ $mahasiswa->nama }}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $mahasiswa->npm }}</li>
                <li class="list-group-item">{{ $mahasiswa->prodi }}</li>
                <li class="list-group-item">{{ $mahasiswa->jk}}</li>
                <li class="list-group-item">{{ $mahasiswa->alamat}}</li>
                <li class="list-group-item">{{ $mahasiswa->tempat}}, {{ $mahasiswa->tgl_lahir }}</li>
            </ul>
        </div>
    </div>
</div>

@endsection
