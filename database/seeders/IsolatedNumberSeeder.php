<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsolatedNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('isolated_numbers')->insert([
            ['id' => 1 , 'number' => 1 , 'code' => '1(13)', 'meaning' => ''],
            ['id' => 2 , 'number' => 2 , 'code' => '2i(55)', 'meaning' => ''],
            ['id' => 3 , 'number' => 3 , 'code' => '3i(52)', 'meaning' => ''],
            ['id' => 4 , 'number' => 4 , 'code' => '4i(56)', 'meaning' => ''],
            ['id' => 5 , 'number' => 5 , 'code' => 'NA', 'meaning' => 'NA'],
            ['id' => 6 , 'number' => 6 , 'code' => '6i(57)', 'meaning' => ''],
            ['id' => 7 , 'number' => 7 , 'code' => '7i(53)', 'meaning' => ''],
            ['id' => 8 , 'number' => 8 , 'code' => '8i(57)', 'meaning' => ''],
            ['id' => 9 , 'number' => 9 , 'code' => 'NA', 'meaning' => 'NA'],
        ]);
    }
}
