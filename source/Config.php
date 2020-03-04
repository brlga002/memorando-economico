<?php
session_start();
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Manaus');


define("SITE", "#Memos Gabriel");

define("ROOT", "http://192.168.0.48/memos");

define("DATA_LAYER_CONFIG", [
"driver" => "mysql",
"host" => "localhost",
"port" => "3306",
"dbname" => "memos",
"username" => "root",
"passwd" => "",
"options" => [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
]
]);

function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

function formataMoeda(string $valor, $sifrao = true): String
{
    $valorFormatado = "R$ 0,00";
    if ($valor !== "") {
                
        if($sifrao){
            $valorFormatado = "R$ " . number_format($valor, 2, ',', '.');
        } else {
            $valorFormatado = number_format($valor, 2, ',', '.');   
        }
        
    } 
    return $valorFormatado;
}

function formataDataParaDocumento($data) {
    $dataFormatada = "";
    if ($data != "") {
        $encoding = mb_internal_encoding(); // ou UTF-8, ISO-8859-1...
        $dataRealizacao = strftime('%d de %B de %Y', strtotime($data));
        #Torna maiusculo
        #$dataFormatada  = mb_strtoupper($dataRealizacao,$encoding);
        $dataFormatada = $dataRealizacao;
    }
    return $dataFormatada;
}

function formataData($data) {
    $dataFormatada = "";
    if ($data != "") {
        $dataFormatada = date("d-m-Y",strtotime($data));
    }
    return $dataFormatada;
}

function zeroEsquerda($numero,$quantidade) {
    $numeroFormatado = "";
    if ($numero != "") {
        $numeroFormatado = str_pad($numero, $quantidade, '0', STR_PAD_LEFT);
    }
    return $numeroFormatado;
}


