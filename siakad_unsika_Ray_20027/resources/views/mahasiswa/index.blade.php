@extends('main')

@section('title', 'Mahasiswa')

@section('content')
<div class="container">
    <div class="float-start">
        <h1>
            Mahasiswa
        </h1>
        <h4>Halaman ini menampilkan data <a href="/mahasiswa" style="text-decoration: none">Mahasiswa</a></h4>
    </div>
    <div class="float-end py-4">
        <a href="/mahasiswa/create" class="btn btn-primary ms-auto">
            Create
        </a>
    </div>
    <div class="row">
        <div class="col">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <table class="table">
        <thead>
          <tr class="table-danger">
            <th scope="col">No</th>
            <th scope="col">NPM</th>
            <th scope="col">Prodi</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tempat, Tanggal Lahir</th>
            <th scope="col">Photo</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($mahasiswa as $mhs)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->jk }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>
                    {{ $mhs->tempat }},
                    {{ $mhs->tgl_lahir }}
                </td>
                <td>
                    <img src="{{ asset('storage/'.$mhs->photo) }}" width="100px" height="100px">
                </td>
                <td>
                    <a href="/mahasiswa/{{ $mhs->id }}" class="btn btn-primary">Details</a>
                    <a href="/mahasiswa/{{ $mhs->id }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/mahasiswa/{{ $mhs->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-primary btn-md" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <td>Data kosong silahkan isi <a href="mahasiswa/create" style="text-decoration: none">disini</a></td>
            @endforelse
        </tbody>
      </table>
</div>
@endsection
