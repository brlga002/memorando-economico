<?php


namespace Source\Support;

class Rota
{
	protected $router;

	public function __construct($router)
    {
 		$this->router = $router;
    }

    public function bindRota(string $nameRouter,$data): String
    {
    	$rota = $this->router->route($nameRouter);
        $pos = strripos($rota, '/');        
        $variavel = substr($rota, $pos+1);
        $novaRota = str_replace($variavel, $data, $rota);
        return $novaRota;
    }
}