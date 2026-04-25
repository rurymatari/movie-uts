<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(Request $request)
    {
        $movies = $this->movieService->getAllMovies($request->search);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'foto_sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $this->movieService->createMovie(
            $validated,
            $request->file('foto_sampul')
        );

        return redirect()->route('movies.index')->with('success', 'Movie berhasil ditambahkan');
    }

    public function show($id)
    {
        $movie = $this->movieService->getMovieById($id);

        if (!$movie) {
            abort(404);
        }

        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = $this->movieService->getMovieById($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'foto_sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $this->movieService->updateMovie(
            $id,
            $validated,
            $request->file('foto_sampul')
        );

        return redirect()->route('movies.index')->with('success', 'Movie berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->movieService->deleteMovie($id);

        return redirect()->route('movies.index')->with('success', 'Movie berhasil dihapus');
    }
}