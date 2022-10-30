@extends('main')
@section('title', 'Details Dosen')
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/'.$dosen->photo) }}" width="250px" height="250px">
        <div class="card-body">
            <div class="card-header">
                {{ $dosen->nama }}
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $dosen->nidn }}</li>
                <li class="list-group-item">{{ $dosen->jk}}</li>
                <li class="list-group-item">{{ $dosen->alamat}}</li>
                <li class="list-group-item">{{ $dosen->tempat}}, {{ $dosen->tgl_lahir }}</li>
              </ul>
        </div>
    </div>
</div>

@endsection
