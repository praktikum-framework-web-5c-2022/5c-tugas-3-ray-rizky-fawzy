@extends('main')

@section('title', 'Edit Dosen')

@section('content')

<div class="container">
    <form action="/dosen/{{ $dosen->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama') ?? $dosen->nama }}">
            @error('nama')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" name="nidn" value="{{ old('nidn') ?? $dosen->nidn }}">
            @error('nidn')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" name="jk">
                <option {{ old('jk') ?? $dosen->jk == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
                <option {{ old('jk') ?? $dosen->jk == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
            </select>
            @error('jk')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text-area" class="form-control" name="alamat" value="{{ old('alamat')  ?? $dosen->alamat}}">
            @error('alamat')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" name="tempat" value="{{ old('tempat')  ?? $dosen->tempat}}">
                    @error('tempat')
                    {{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir')  ?? $dosen->tgl_lahir}}">
                    @error('tgl_lahir')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" name="photo" value="{{ old('photo')  ?? $dosen->photo}}">
            <img src="{{ asset('storage/'.$dosen->photo) }}" width="106px" height="110px" alt="{{ $dosen->nama }}" class="mt-2">
            @error('photo')
                {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
