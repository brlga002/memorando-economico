<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Alert;

class Conta extends DataLayer
{
    public function __construct()
    {
        parent::__construct("conta", ["conta"]);
    }

    public function destroy(): bool
    {
    	$memorando = (new Memorando())->find("id_conta = :id_conta", "id_conta={$this->id}")->fetch(true);
    	if ($memorando){
			(new Alert())->setAlert("A conta <strong>{$this->conta}</strong> está vinculada a um memorando","danger");
			return false;
    	} else {
    		(new Alert())->setAlert("Conta {$this->conta} Deletada","success");
			return parent::destroy();    		
    	}    	
    }

    public function save(): bool
    {    	
		if (parent::save()) {
			(new Alert())->setAlert("Conta <strong>{$this->conta}</strong> Salva","success");
			return true;
		} else {
			(new Alert())->setAlert("Não foi possivel Salvar Conta <strong>{$this->conta}</strong>","warning");
			return false;
		}	    
	}
}