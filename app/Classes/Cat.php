<?php
namespace App\Classes;

use App\Contracts\AnimalContract;

class Cat implements AnimalContract
{
    public function talk() {
        return 'Meeeoow.';
    }
}