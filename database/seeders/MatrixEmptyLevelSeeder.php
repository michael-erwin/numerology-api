<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrixEmptyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matrix_empty_levels')->insert([
            ['id' => 1 , 'code' => 369, 'meaning' => 'Inspiration'],
            ['id' => 2 , 'code' => 258, 'meaning' => 'Sensitivity'],
            ['id' => 3 , 'code' => 147, 'meaning' => 'Acumen'],
            ['id' => 4 , 'code' => 159, 'meaning' => 'Development'],
            ['id' => 5 , 'code' => 357, 'meaning' => 'Vision'],
            ['id' => 6 , 'code' => 321, 'meaning' => '(Empty)'],
            ['id' => 7 , 'code' => 654, 'meaning' => 'Saturn'],
            ['id' => 8 , 'code' => 987, 'meaning' => 'Adherence'],
        ]);
    }
}
