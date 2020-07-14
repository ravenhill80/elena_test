<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService {

    protected $bookRepository;

    public function __construct(BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    public function listBooks() {
        $book = $this->bookRepository->getAllBooks();
        return response()->json(['success' => 'true', 'data' => $book], 200);
    }

    public function storeBook($book) {
        $bookData['name'] = $book['name'];
        $bookData['year'] = $book['year'];
        $bookData['author'] = $book['author'];
        $newBook = $this->bookRepository->createBook($bookData);
        $newBook->genres()->attach($book['genres']);
        return response()->json(['success' => 'true', 'data' => $book], 200);
    }

    public function showBook($id) {
        $book = $this->bookRepository->getBook($id);
        return response()->json(['success' => 'true', 'data' => $book], 200);
    }

    public function updateBook($book, $id) {
        $bookData['name'] = $book['name'];
        $bookData['year'] = $book['year'];
        $bookData['author'] = $book['author'];
        $currentBook = $this->bookRepository->getBook($id);
        if (!$currentBook)
            return response()->json(['success' => 'false'], 200);

        $currentBook->genres()->detach();
        $currentBook->genres()->attach($book['genres']);
        $this->bookRepository->updateBook($bookData, $id);
        return response()->json(['success' => 'true'], 200);
    }

    public function destroyBook($id) {
        $this->bookRepository->deleteBook($id);
        return response()->json(['success' => 'true'], 200);
    }

}
