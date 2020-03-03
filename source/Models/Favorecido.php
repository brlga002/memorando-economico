<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Alert;

class Favorecido extends DataLayer
{
    public function __construct()
    {
        parent::__construct("favorecido", ["favorecido"]);
    }

    public function destroy(): bool
    {
    	$memorando = (new Memorando())->find("id_favorecido = :id_favorecido", "id_favorecido={$this->id}")->fetch(true);
    	if ($memorando){
			(new Alert())->setAlert("A favorecido <strong>{$this->favorecido}</strong> está vinculada a um memorando","danger");
			return false;
    	} else {
    		(new Alert())->setAlert("favorecido {$this->favorecido} Deletada","success");
			return parent::destroy();    		
    	}    	
    }

    public function save(): bool
    {    	
		if (parent::save()) {
			(new Alert())->setAlert("favorecido <strong>{$this->favorecido}</strong> Salva","success");
			return true;
		} else {
			(new Alert())->setAlert("Não foi possivel Salvar favorecido <strong>{$this->favorecido}</strong>","warning");
			return false;
		}	    
	}
}