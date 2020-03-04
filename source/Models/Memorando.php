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

    public function favorecido(): String
    {
        $retorno = ((new Favorecido))->findById($this->id_favorecido);
        $retorno = (isset($retorno->favorecido)) ? $retorno->favorecido : "";
        return $retorno;
    }

    public function referente(): String
    {
        $retorno = ((new Referente))->findById($this->id_referente);
        $retorno = (isset($retorno->referente)) ? $retorno->referente : "";
        return $retorno;
    }
}