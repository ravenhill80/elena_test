<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model {

    protected $table = 'books_genres';
    protected $fillable = [
        'book_id', 'genre_id'
    ];
    public $timestamps = false;

}
