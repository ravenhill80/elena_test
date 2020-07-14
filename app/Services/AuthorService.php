<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService {

    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository) {
        $this->authorRepository = $authorRepository;
    }

    public function listAuthors() {
        $author = $this->authorRepository->getAllAuthors();
        return response()->json(['success' => 'true', 'data' => $author], 200);
    }

    public function storeAuthor($author) {
        $author = $this->authorRepository->createAuthor($author);
        return response()->json(['success' => 'true', 'data' => $author], 200);
    }

    public function showAuthor($id) {
        $author = $this->authorRepository->getAuthor($id);
        return response()->json(['success' => 'true', 'data' => $author], 200);
    }

    public function updateAuthor($author, $id) {
        $this->authorRepository->updateAuthor($author, $id);
        return response()->json(['success' => 'true'], 200);
    }

    public function destroyAuthor($id) {
        if ($this->authorRepository->checkBooks($id)) {
            $this->authorRepository->deleteAuthor($id);
            return response()->json(['success' => 'true'], 200);
        }
        return response()->json(['success' => 'false'], 200);
    }

}
