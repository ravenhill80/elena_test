<?php

namespace App\Services;

use App\Repositories\BookRepository;
use Illuminate\Support\Arr;

class BookService {

    protected $bookRepository;

    public function __construct(BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    public function listBooks($request) {
        $book = $this->bookRepository->getAllBooks($request);
        if ($request->filter) {
            $sorted = $book;
            switch ($request->filter) {
                case 'author_id':
                    $sorted = $book->sortBy(function ($item, $key) {
                        return $item->authors->id;
                    });
                    break;
                case 'author_name':
                    $sorted = $book->sortBy(function ($item, $key) {
                        return $item->authors->first_name;
                    });
                    break;
                case 'book_name':
                    $sorted = $book->sortBy(function ($item, $key) {
                        return $item->name;
                    });
                    break;
                case 'genre_id':
                    $sorted = $book->sortBy(function ($item, $key) {
                        return array_values(Arr::sort($item->genres, function ($value) {
                                    return $value['id'];
                                }));
                    });
                    break;
                case 'genre_name':
                    $sorted = $book->sortBy(function ($item, $key) {
                        return array_values(Arr::sort($item->genres, function ($value) {
                                    return $value['name'];
                                }));
                    });
                    break;
            }

            return response()->json(['success' => 'true', 'data' => $sorted->values()->all()], 200);
        }
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
