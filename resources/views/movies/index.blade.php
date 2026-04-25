@extends('layouts.app')

@section('content')


<h3>Daftar Movie</h3>

<form method="GET">
    <input type="text" name="search" placeholder="Cari movie..." class="form-control mb-3">
</form>

<div class="row">
    @foreach($movies as $movie)
        @include('movies.partials.card', ['movie' => $movie])
    @endforeach
</div>

{{ $movies->withQueryString()->links() }}

@endsection