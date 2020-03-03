<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Referente extends DataLayer
{
    public function __construct()
    {
        parent::__construct("referente", ["referente"]);
    }
}