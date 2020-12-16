<?php
return [
    'arrow_rules' => [
        'l' => [
            'zodiac' => ["ari", "leo", "sag"],
            'number' => [1, 3, 5, 8]
        ],
        'r' => [
            'zodiac' => ["can", "sco", "pis"],
            'number' => [2, 6, 7, 0]
        ],
        'b' => [
            'zodiac' => ["tau", "vir", "cap"],
            'number' => [4, 7]
        ],
        'a' => [
            'zodiac' => ["gem", "lib", "aqu"],
            'number' => [9]
        ],
    ],
    'zodiac_signs' => [ // [month => day]
        'aqu' => [1 => 20, 2 => 18],  //aquarius
        'pis' => [2 => 19, 3 => 20],  //pisces
        'ari' => [3 => 21, 4 => 19],  //aries
        'tau' => [4 => 20, 5 => 20],  //taurus
        'gem' => [5 => 21, 6 => 20],  //gemini
        'can' => [6 => 21, 7 => 22],  //cancer
        'leo' => [7 => 23, 8 => 22],  //leo
        'vir' => [8 => 23, 9 => 22],  //virgo
        'lib' => [9 => 23, 10 => 22], //libra
        'sco' => [10 => 23, 11 => 21],//scorpio
        'sag' => [11 => 22, 12 => 21],//sagittarius
        'cap' => [12 => 22, 1 => 19], //capricorn
    ]
];