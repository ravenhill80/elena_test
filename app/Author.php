<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

    protected $table = "authors";
    protected $fillable = [
        'first_name', 'last_name'
    ];
    public $timestamps = false;

    /**
     * Get the book record associated with the author.
     */
    public function books() {
        return $this->belongsTo('App\Book', 'id', 'author');
    }

}
