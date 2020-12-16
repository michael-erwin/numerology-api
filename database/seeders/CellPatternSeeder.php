<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CellPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cell_patterns')->insert([
            ['id' => 1, 'pattern' => '/^(1l){1}$/', 'code' => '1(1)', 'meaning' => ''],
            ['id' => 2, 'pattern' => '/^(1l){2}$/', 'code' => '1(2)', 'meaning' => ''],
            ['id' => 3, 'pattern' => '/^(1l){3,}$/', 'code' => '1(3)', 'meaning' => ''],
            ['id' => 4, 'pattern' => '/^(1l1r|1r1l)$/', 'code' => '1(4)', 'meaning' => ''],
            ['id' => 5, 'pattern' => '/^(1l1b|1b1l)$/', 'code' => '1(5)', 'meaning' => ''],
            ['id' => 6, 'pattern' => '/^(1l1a|1a1l)$/', 'code' => '1(6)', 'meaning' => ''],
            ['id' => 7, 'pattern' => '/^(1l1r1b|1l1b1r|1r1l1b|1r1b1l|1b1l1r|1b1r1l)$/', 'code' => '1(7)', 'meaning' => ''],
            ['id' => 8, 'pattern' => '/^((1l1b|1b1l)1[lb]|1[lb](1l1b|1b1l))$/', 'code' => '1(8)', 'meaning' => ''],
            ['id' => 9, 'pattern' => '/(1l|1r)*(1l1l1r|1l1r1l|1r1l1l|1r1r1l|1r1l1r|1l1r1r)+(1l|1r)*/', 'code' => '1(9)', 'meaning' => ''],
            ['id' => 10, 'pattern' => '/^(1l1l1a1a|1l1a1l1a|1l1a1a1l|1a1l1l1a|1a1a1l1l|1a1l1a1l)$/', 'code' => '1(10)', 'meaning' => ''],
            ['id' => 11, 'pattern' => '/1a*(?=(1r|1b|1a)*1l)(?=(1l|1b|1a)*1r)(?=(1l|1r|1a)*1b)(?=(1l|1r|1b)*1a)1a*/', 'code' => '1(11)', 'meaning' => ''],
            ['id' => 12, 'pattern' => '/^2l$/', 'code' => '2(1)', 'meaning' => ''],
            ['id' => 13, 'pattern' => '/^2r$/', 'code' => '2(2)', 'meaning' => ''],
            ['id' => 14, 'pattern' => '/^(2a|2b)$/', 'code' => '2(3)', 'meaning' => ''],
            ['id' => 15, 'pattern' => '/^(2l2r|2r2l)$/', 'code' => '2(4)', 'meaning' => ''],
            ['id' => 16, 'pattern' => '/^2l2l$/', 'code' => '2(5)', 'meaning' => ''],
            ['id' => 17, 'pattern' => '/^2r2r$/', 'code' => '2(6)', 'meaning' => ''],
            ['id' => 18, 'pattern' => '/^(2[lrba]){3,}$/', 'code' => '2(7)', 'meaning' => ''],
            ['id' => 19, 'pattern' => '/^3l$/', 'code' => '3(8)', 'meaning' => ''],
            ['id' => 20, 'pattern' => '/^3r$/', 'code' => '3(9)', 'meaning' => ''],
            ['id' => 21, 'pattern' => '/^(3a|3b)$/', 'code' => '3(10)', 'meaning' => ''],
            ['id' => 22, 'pattern' => '/^3l3l$/', 'code' => '3(11)', 'meaning' => ''],
            ['id' => 23, 'pattern' => '/^3r3r$/', 'code' => '3(12)', 'meaning' => ''],
            ['id' => 24, 'pattern' => '/(3l3[rba]|3r3[lba]|3b3[lra]|3a3[lrb])+/', 'code' => '3(13)', 'meaning' => ''],
            ['id' => 25, 'pattern' => '/^4b$/', 'code' => '4(14)', 'meaning' => ''],
            ['id' => 26, 'pattern' => '/^(4l|4a)$/', 'code' => '4(15)', 'meaning' => ''],
            ['id' => 27, 'pattern' => '/^4r$/', 'code' => '4(16)', 'meaning' => ''],
            ['id' => 28, 'pattern' => '/^4l4l$/', 'code' => '4(17)', 'meaning' => ''],
            ['id' => 29, 'pattern' => '/^4r4r$/', 'code' => '4(18)', 'meaning' => ''],
            ['id' => 30, 'pattern' => '/(4l4[rba]|4r4[lba]|4b4[lra]|4a4[lrb])+/', 'code' => '4(19)', 'meaning' => ''],
            ['id' => 31, 'pattern' => '/^5r$/', 'code' => '5(20)', 'meaning' => ''],
            ['id' => 32, 'pattern' => '/^5l$/', 'code' => '5(21)', 'meaning' => ''],
            ['id' => 33, 'pattern' => '/^(5a|5b)$/', 'code' => '5(22)', 'meaning' => ''],
            ['id' => 34, 'pattern' => '/^5r5r$/', 'code' => '5(23)', 'meaning' => ''],
            ['id' => 35, 'pattern' => '/^5l5l$/', 'code' => '5(24)', 'meaning' => ''],
            ['id' => 36, 'pattern' => '/(5l5[rba]|5r5[lba]|5b5[lra]|5a5[lrb])+/', 'code' => '5(25)', 'meaning' => ''],
            ['id' => 37, 'pattern' => '/^6l$/', 'code' => '6(26)', 'meaning' => ''],
            ['id' => 38, 'pattern' => '/^6r$/', 'code' => '6(27)', 'meaning' => ''],
            ['id' => 39, 'pattern' => '/^6[ba]$/', 'code' => '6(28)', 'meaning' => ''],
            ['id' => 40, 'pattern' => '/^6l6l$/', 'code' => '6(29)', 'meaning' => ''],
            ['id' => 41, 'pattern' => '/^6r6r$/', 'code' => '6(30)', 'meaning' => ''],
            ['id' => 42, 'pattern' => '/(6l6[rba]|6r6[lba]|6b6[lra]|6a6[lrb])+/', 'code' => '6(31)', 'meaning' => ''],
            ['id' => 43, 'pattern' => '/^7[rb]$/', 'code' => '7(32)', 'meaning' => ''],
            ['id' => 44, 'pattern' => '/^7l$/', 'code' => '7(33)', 'meaning' => ''],
            ['id' => 45, 'pattern' => '/^7[ba]$/', 'code' => '7(34)', 'meaning' => ''],
            ['id' => 46, 'pattern' => '/^7l7l$/', 'code' => '7(35)', 'meaning' => ''],
            ['id' => 47, 'pattern' => '/^(7r7b|7b7r|7b7b)$/', 'code' => '7(36)', 'meaning' => ''],
            ['id' => 48, 'pattern' => '/^7r7r$/', 'code' => '7(37)', 'meaning' => ''],
            ['id' => 49, 'pattern' => '/(7l7[rba]|7r7[la]|7b7[la]|7a7[lrb])+/', 'code' => '7(38)', 'meaning' => ''],
            ['id' => 50, 'pattern' => '/^8l$/', 'code' => '8(39)', 'meaning' => ''],
            ['id' => 51, 'pattern' => '/^8r$/', 'code' => '8(40)', 'meaning' => ''],
            ['id' => 52, 'pattern' => '/^8[ba]$/', 'code' => '8(41)', 'meaning' => ''],
            ['id' => 53, 'pattern' => '/^8l8l$/', 'code' => '8(42)', 'meaning' => ''],
            ['id' => 54, 'pattern' => '/^8r8r$/', 'code' => '8(43)', 'meaning' => ''],
            ['id' => 55, 'pattern' => '/(8l8[rba]|8r8[lba]|8b8[lra]|8a8[lrb])+/', 'code' => '8(44)', 'meaning' => ''],
            ['id' => 56, 'pattern' => '/^9l$/', 'code' => '9(45)', 'meaning' => ''],
            ['id' => 57, 'pattern' => '/^9r$/', 'code' => '9(46)', 'meaning' => ''],
            ['id' => 58, 'pattern' => '/^9[ba]$/', 'code' => '9(47)', 'meaning' => ''],
            ['id' => 59, 'pattern' => '/^9l9l$/', 'code' => '9(48)', 'meaning' => ''],
            ['id' => 60, 'pattern' => '/^9r9r$/', 'code' => '9(49)', 'meaning' => ''],
            ['id' => 61, 'pattern' => '/(9l9[rba]|9r9[lba]|9b9[lra]|9a9[lrb])+/', 'code' => '9(50)', 'meaning' => ''],
        ]);
    }
}
