<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Alert;

class Subelemento extends DataLayer
{
    public function __construct()
    {
        parent::__construct("subelemento", ["subelemento"]);
    }

    public function destroy(): bool
    {
    	$memorando = (new Memorando())->find("id_subelemento = :id_subelemento", "id_subelemento={$this->id}")->fetch(true);
    	if ($memorando){
			(new Alert())->setAlert("A subelemento <strong>{$this->subelemento}</strong> está vinculada a um memorando","danger");
			return false;
    	} else {
    		(new Alert())->setAlert("subelemento {$this->subelemento} Deletada","success");
			return parent::destroy();    		
    	}    	
    }

    public function save(): bool
    {    	
		if (parent::save()) {
			(new Alert())->setAlert("subelemento <strong>{$this->subelemento}</strong> Salva","success");
			return true;
		} else {
			(new Alert())->setAlert("Não foi possivel Salvar subelemento <strong>{$this->subelemento}</strong>","warning");
			return false;
		}	    
	}
}