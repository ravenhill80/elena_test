<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('genres')->insert([
            [
                'id' => '1',
                'name' => 'Мистика',
            ],
            [
                'id' => '2',
                'name' => 'Приключения',
            ],
            [
                'id' => '3',
                'name' => 'Фантастика',
            ],
            [
                'id' => '4',
                'name' => 'Роман',
            ],
            [
                'id' => '5',
                'name' => 'Фэнтези',
            ],
        ]);
    }

}
