<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    protected $table = "genres";
    protected $fillable = [
        'name'
    ];
    protected $hidden = ['pivot'];
    public $timestamps = false;

    /**
     * Get the book record associated with the genre.
     */
    public function books() {
        return $this->belongsToMany('App\Book', 'books_genres', 'genre_id', 'book_id');
    }

}
