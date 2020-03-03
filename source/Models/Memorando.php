<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Memorando extends DataLayer
{
    public function __construct()
    {
        parent::__construct("memorando", ["numero"]);
    }

    public function proximoNumero(string $anoMemorando = '2020'): String
    {
       $numeroMemo = $this->find("anoMemorando = :anoMemorando", "anoMemorando={$anoMemorando}")->limit(2)->offset(0)->order("numero DESC")->fetch(false);
       return (isset($numeroMemo->numero)) ? $numeroMemo->numero + 1 : '1' ;
    }
}