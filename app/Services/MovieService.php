<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovies($search = null)
    {
        return $this->movieRepository->getAll($search);
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->findById($id);
    }

    public function createMovie($data, $file = null)
    {
        if ($file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            $data['foto_sampul'] = $fileName;
        }

        return $this->movieRepository->create($data);
    }

    public function updateMovie($id, $data, $file = null)
    {
        $movie = $this->movieRepository->findById($id);

        if ($file) {
            $randomName = Str::uuid()->toString();
            $fileName = $randomName . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $fileName);

            if (File::exists(public_path('images/' . $movie->foto_sampul))) {
                File::delete(public_path('images/' . $movie->foto_sampul));
            }

            $data['foto_sampul'] = $fileName;
        }

        return $this->movieRepository->update($id, $data);
    }

    public function deleteMovie($id)
    {
        $movie = $this->movieRepository->findById($id);

        if (File::exists(public_path('images/' . $movie->foto_sampul))) {
            File::delete(public_path('images/' . $movie->foto_sampul));
        }

        return $this->movieRepository->delete($id);
    }
}