<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrixFullLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matrix_full_levels')->insert([
            ['id' => 1 , 'code' => 369, 'meaning' => 'Empathy'],
            ['id' => 2 , 'code' => 258, 'meaning' => 'Passion'],
            ['id' => 3 , 'code' => 147, 'meaning' => 'Handyness'],
            ['id' => 4 , 'code' => 159, 'meaning' => 'Intention'],
            ['id' => 5 , 'code' => 357, 'meaning' => 'Understanding'],
            ['id' => 6 , 'code' => 321, 'meaning' => 'Thinking'],
            ['id' => 7 , 'code' => 654, 'meaning' => 'Assiduity'],
            ['id' => 8 , 'code' => 987, 'meaning' => 'Energy'],
        ]);
    }
}
