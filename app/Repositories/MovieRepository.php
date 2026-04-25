<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll($search = null)
    {
        $query = Movie::query();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        return $query->latest()->paginate(5);
    }

    public function findById($id)
    {
        return Movie::findOrFail($id);
    }

    public function create(array $data)
    {
        return Movie::create($data);
    }

    public function update($id, array $data)
    {
        $movie = $this->findById($id);
        $movie->update($data);
        return $movie;
    }

    public function delete($id)
    {
        $movie = $this->findById($id);
        return $movie->delete();
    }
}