<?php

namespace App\Repositories;

use App\Book as Model;
use App\BookGenre;

class BookRepository extends CoreRepository {

    protected function getModelClass() {
        return Model::class;
    }

    public function getAllBooks() {
        return $this->startConditions()->with('genres', 'author')->get();
    }

    public function createBook($book) {
        return $this->startConditions()->create($book);
    }

    public function getBook($id) {
        return $this->startConditions()->find($id);
    }

    public function updateBook($book, $id) {
        return $this->startConditions()->where('id', $id)->update($book);
    }

    public function deleteBook($id) {
        $this->clearBooksGenres($id);
        return $this->startConditions()->where('id', $id)->delete();
    }

    public function clearBooksGenres($bookId) {
        return BookGenre::where('book_id', $bookId)->delete();
    }

}
