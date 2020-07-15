<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('authors')->insert([
            [
                'id' => '1',
                'first_name' => 'Стивен',
                'last_name' => 'Кинг',
            ],
            [
                'id' => '2',
                'first_name' => 'Джек',
                'last_name' => 'Лондон',
            ],
        ]);
    }

}
