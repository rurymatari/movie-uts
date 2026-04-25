@extends('layouts.app')

@section('content')


<h3>Detail Movie</h3>

<img src="{{ asset('images/' . $movie->foto_sampul) }}" width="200">

<h4>{{ $movie->judul }}</h4>
<p>{{ $movie->deskripsi }}</p>

<a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>

@endsection