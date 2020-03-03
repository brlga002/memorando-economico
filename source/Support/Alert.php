<?php


namespace Source\Support;

class Alert
{
    public function setAlert(string $text,string $type = 'info' ): void
	{
		#Tipos de Alerta success|info|warning|danger|primary|secondary|dark|light
    	$_SESSION["alerts"][] = ["type"=>$type,"text"=>$text];
	}

	public function getAlert(): array
	{
	    if (isset($_SESSION["alerts"])){
	        $messagens = $_SESSION["alerts"];
	        unset($_SESSION["alerts"]);
	        return $messagens;
	    }
	    return array();
	}
}