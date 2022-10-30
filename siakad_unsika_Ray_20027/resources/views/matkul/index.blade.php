@extends('main')

@section('title', 'Mata Kuliah')

@section('content')
<div class="container">
    <div class="float-start">
        <h1>
            Mata Kuliah
        </h1>
        <h4>Halaman ini menampilkan data <a href="/matkul" style="text-decoration: none">Mata Kuliah</a></h4>
    </div>
    <div class="float-end py-4">
        <a href="/matkul/create" class="btn btn-primary ms-auto">
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
            <th scope="col">Kode Mata Kuliah</th>
            <th scope="col">Nama Mata Kuliah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($matakuliah as $mk)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $mk->kode_mk }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>
                        <a href="/matkul/{{ $mk->id }}" class="btn btn-primary">Details</a>
                        <a href="/matkul/{{ $mk->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/matkul/{{ $mk->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary btn-md" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td>Data kosong silahkan isi <a href="matkul/create" style="text-decoration: none">disini</a></td>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
