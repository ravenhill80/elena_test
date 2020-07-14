<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $table = 'books';
    protected $fillable = [
        'name', 'year', 'author'
    ];
    public $timestamps = false;

    /**
     * Get the genre record associated with the book.
     */
    public function genres() {
        return $this->belongsToMany('App\Genre', 'books_genres', 'book_id', 'genre_id');
    }

    /**
     * Get the author record associated with the book.
     */
    public function authors() {
        return $this->belongsTo('App\Author', 'author', 'id');
    }

}
