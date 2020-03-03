<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Favorecido extends DataLayer
{
    public function __construct()
    {
        parent::__construct("favorecido", ["favorecido"]);
    }
}