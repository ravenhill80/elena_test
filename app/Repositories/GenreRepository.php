<?php

namespace App\Repositories;

use App\Genre as Model;

class GenreRepository extends CoreRepository {

    protected function getModelClass() {
        return Model::class;
    }

    public function getAllGenres() {
        return $this->startConditions()->get();
    }

    public function createGenre($genre) {
        return $this->startConditions()->create($genre);
    }

    public function getGenre($id) {
        return $this->startConditions()->find($id);
    }

    public function updateGenre($genre, $id) {
        return $this->startConditions()->where('id', $id)->update($genre);
    }

    public function deleteGenre($id) {
        return $this->startConditions()->where('id', $id)->delete();
    }

    public function checkBooks($id) {
        return $this->startConditions()->whereDoesntHave('books')->where('id', $id)->count();
    }

}
