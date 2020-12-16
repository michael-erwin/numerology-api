<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissingNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('missing_numbers')->insert([
            ['id' => 1 , 'number' => 1, 'code' => '1(12)', 'meaning' => ''],
            ['id' => 2 , 'number' => 2, 'code' => '2m(59)', 'meaning' => ''],
            ['id' => 3 , 'number' => 3, 'code' => '3m(60)', 'meaning' => ''],
            ['id' => 4 , 'number' => 4, 'code' => '4m(61)', 'meaning' => ''],
            ['id' => 5 , 'number' => 5, 'code' => '5m(62)', 'meaning' => ''],
            ['id' => 6 , 'number' => 6, 'code' => '6m(63)', 'meaning' => ''],
            ['id' => 7 , 'number' => 7, 'code' => '7m(64)', 'meaning' => ''],
            ['id' => 8 , 'number' => 8, 'code' => '8m(65)', 'meaning' => ''],
            ['id' => 9 , 'number' => 9, 'code' => '9m(66)', 'meaning' => ''],
        ]);
    }
}
