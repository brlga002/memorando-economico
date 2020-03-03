<?php

namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use Error;
use PDO;
use PDOException;

class DataStart extends DataLayer
{
    public function __construct()
    {
        try {
            $connect = Connect::getInstance();
            $error = Connect::getError();
            if($error) {
                throw new Error($error->getMessage());
            }
        }catch (Error $e) {
            echo 'Erro capturado no teste de conexão: ',  $e->getMessage(), "<br>";
            if ($e->getMessage() === "SQLSTATE[HY000] [1049] Unknown database '". DATA_LAYER_CONFIG["dbname"]."'"){
                $this->criarBancoDados();
                $this->criarTabelas();
            }
        }
    }

    public function criarBancoDados(): void
    {
        try {
            $conn = new PDO(DATA_LAYER_CONFIG["driver"]. ':host=' .DATA_LAYER_CONFIG["host"]. ';dbname=', DATA_LAYER_CONFIG["username"], DATA_LAYER_CONFIG["passwd"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->query('create database ' . DATA_LAYER_CONFIG["dbname"]);
            echo "Banco de dados: <strong>", DATA_LAYER_CONFIG["dbname"], "</strong> criado com sucesso!" , "<br>";
        } catch(PDOException $e) {
            echo 'Erro ao tentar criar banco de dados: ' . $e->getMessage(), "<br>";
        }
    }

    public function criarTabelas(): void
    {
        try {
            $conn = new PDO(DATA_LAYER_CONFIG["driver"]. ':host=' .DATA_LAYER_CONFIG["host"]. ';dbname='.DATA_LAYER_CONFIG["dbname"], DATA_LAYER_CONFIG["username"], DATA_LAYER_CONFIG["passwd"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $ultimoArquivoSql = $this->getNomeUltimoArquivoSql();
            if(file_exists(__DIR__. "/../../databases/{$ultimoArquivoSql}")){
                $dataFile = file_get_contents (__DIR__. "/../../databases/{$ultimoArquivoSql}");
                $conn->query($dataFile);
                echo "Tabelas do banco de dados: <strong>", DATA_LAYER_CONFIG["dbname"], "</strong> criadas com sucesso!" , "<br>";
            } else {
                echo  "Sem arquivo para criação de Tabelas";
            }
        } catch(PDOException $e) {
            echo 'Erro ao tentar criar tabelas: ' . $e->getMessage(), "<br>";
        }
    }

    public function getNomeUltimoArquivoSql(): String
    {
        $pasta = __DIR__. "/../../databases/";

        if(is_dir($pasta)) {
            $diretorio = dir($pasta);
            while($arquivo = $diretorio->read()) {
                if($arquivo != '..' && $arquivo != '.')
                {
                // Cria um Arrquivo com todos os Arquivos encontrados
                $arrayArquivos[] = $arquivo;
                }
            }
            $diretorio->close();
        }
        if (isset($arrayArquivos[0])){
            rsort($arrayArquivos, SORT_STRING);
            return $arrayArquivos[0];
        } else {
            echo "Sem arquivo de SQL em {$pasta} <br>";
            return "";
        }

    }
}