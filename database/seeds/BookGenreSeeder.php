<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('books_genres')->insert([
            [
                'book_id' => '1',
                'genre_id' => '1',
            ],
            [
                'book_id' => '2',
                'genre_id' => '5',
            ],
            [
                'book_id' => '3',
                'genre_id' => '4',
            ],
            [
                'book_id' => '4',
                'genre_id' => '2',
            ],
            [
                'book_id' => '5',
                'genre_id' => '5',
            ],
        ]);
    }

}
