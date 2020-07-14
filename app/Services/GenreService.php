<?php

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService {

    protected $genreRepository;

    public function __construct(GenreRepository $genreRepository) {
        $this->genreRepository = $genreRepository;
    }

    public function listGenres() {
        $genre = $this->genreRepository->getAllGenres();
        return response()->json(['success' => 'true', 'data' => $genre], 200);
    }

    public function storeGenre($genre) {
        $genre = $this->genreRepository->createGenre($genre);
        return response()->json(['success' => 'true', 'data' => $genre], 200);
    }

    public function showGenre($id) {
        $genre = $this->genreRepository->getGenre($id);
        return response()->json(['success' => 'true', 'data' => $genre], 200);
    }

    public function updateGenre($genre, $id) {
        $this->genreRepository->updateGenre($genre, $id);
        return response()->json(['success' => 'true'], 200);
    }

    public function destroyGenre($id) {
        if ($this->genreRepository->checkBooks($id)) {
            $this->genreRepository->deleteGenre($id);
            return response()->json(['success' => 'true'], 200);
        }
        return response()->json(['success' => 'false'], 200);
    }

}
