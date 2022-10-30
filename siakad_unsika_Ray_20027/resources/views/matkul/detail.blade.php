@extends('main')
@section('title', 'Details Mata Kuliah')
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
          {{ $matkul->nama_mk }}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ $matkul->kode_mk }}</li>
        </ul>
    </div>
</div>

@endsection
