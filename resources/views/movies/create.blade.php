@extends('layouts.app')

@section('content')


<h3>Tambah Movie</h3>

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul">

    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

    <input type="file" name="foto_sampul" class="form-control mb-2">

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection