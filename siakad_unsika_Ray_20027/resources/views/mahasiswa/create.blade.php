@extends('main')
@section('title', 'Insert Mahasiswa')

@section('content')
    <div class="container">
        <form method="post" action="/mahasiswa" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" name="npm" value="{{ old('npm') }}">
                @error('npm')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <select class="form-select" aria-label="Default select example" name="prodi">
                    <option {{ old('prodi') == 'Informatika' ? 'selected' : '' }} value="Informatika">Informatika</option>
                    <option {{ old('prodi') == 'Sistem Informasi' ? 'selected' : '' }} value="Sistem Informasi">Sistem Informasi</option>
                </select>
                @error('prodi')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jk">
                    <option {{ old('jk') == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
                    <option {{ old('jk') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                </select>
                @error('jk')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text-area" class="form-control" name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" value="{{ old('tempat') }}">
                        @error('tempat')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        @error('tgl_lahir')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                @error('photo')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
