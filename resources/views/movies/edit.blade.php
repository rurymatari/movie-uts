@extends('layouts.app')

@section('content')


<h3>Edit Movie</h3>

<form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="judul" value="{{ $movie->judul }}" class="form-control mb-2">

    <textarea name="sinopsis" class="form-control mb-2">{{ $movie->sinopsis }}</textarea>

    <input type="file" name="foto_sampul" class="form-control mb-2">

    <button class="btn btn-success">Update</button>
</form>

@endsection