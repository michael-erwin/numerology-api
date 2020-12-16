<?php
namespace App\Classes;

use App\Contracts\AnimalContract;

class Dog implements AnimalContract
{
    public function talk() {
        return 'Aw aw aw.';
    }
}