<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(
        InnerPsycheSeeder $inner_psyche,
        OuterPsycheSeeder $outer_psyche,
        CellPatternSeeder $cell_pattern,
        IsolatedNumberSeeder $isolated_number,
        MatrixEmptyLevelSeeder $matrix_empty_level,
        MatrixFullLevelSeeder $matrix_full_level,
        MissingNumberSeeder $missing_number
    )
    {
        // \App\Models\User::factory(10)->create();
        $inner_psyche->run();
        $outer_psyche->run();
        $cell_pattern->run();
        $isolated_number->run();
        $matrix_empty_level->run();
        $matrix_full_level->run();
        $missing_number->run();
    }
}
