<?php

namespace App\Repositories;

use App\Author as Model;

class AuthorRepository extends CoreRepository {

    protected function getModelClass() {
        return Model::class;
    }

    public function getAllAuthors() {
        return $this->startConditions()->get();
    }

    public function createAuthor($author) {
        return $this->startConditions()->create($author);
    }

    public function getAuthor($id) {
        return $this->startConditions()->find($id);
    }

    public function updateAuthor($author, $id) {
        return $this->startConditions()->where('id', $id)->update($author);
    }

    public function deleteAuthor($id) {
        return $this->startConditions()->where('id', $id)->delete();
    }

    public function checkBooks($id) {
        return $this->startConditions()->whereDoesntHave('books')->where('id', $id)->count();
    }

}
