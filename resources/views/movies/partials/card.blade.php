<div class="col-md-4 mb-3">
    <div class="card">
        <img src="{{ asset('images/' . $movie->foto_sampul) }}" class="card-img-top">
        <div class="card-body">
            <h5>{{ $movie->judul }}</h5>
            <p>{{ $movie->sinopsis }}</p>

            <a href="{{ route('movies.show', $movie->id) }}">Detail</a>
            <a href="{{ route('movies.edit', $movie->id) }}">Edit</a>

            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Hapus</button>
            </form>
        </div>
    </div>
</div>