@extends('main')

@section('title', 'Edit Mata Kuliah')
@section('content')
<div class="container">
    <form method="post" action="/matkul/{{ $matkul->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
            <input  type="text" class="form-control" name="kode_mk" value="{{ old('kode_mk') ?? $matkul->kode_mk }}">
            @error('kode_mk')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="nama_mk" value="{{ old('nama_mk') ?? $matkul->nama_mk }}">
            @error('nama_mk')
                {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
