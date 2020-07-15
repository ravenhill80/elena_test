<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('books')->insert([
            [
                'id' => '1',
                'name' => 'Сияние',
                'year' => '1977',
                'author' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Белый клык',
                'year' => '1906',
                'author' => '2',
            ],
            [
                'id' => '3',
                'name' => 'Темная башня',
                'year' => '2004',
                'author' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Зов предков',
                'year' => '1903',
                'author' => '2',
            ],
            [
                'id' => '5',
                'name' => 'Зеленая миля',
                'year' => '1996',
                'author' => '1',
            ],
        ]);
    }

}
