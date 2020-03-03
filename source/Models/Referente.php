<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Support\Alert;

class Referente extends DataLayer
{
    public function __construct()
    {
        parent::__construct("referente", ["referente"]);
    }

    public function destroy(): bool
    {
    	$memorando = (new Memorando())->find("id_referente = :id_referente", "id_referente={$this->id}")->fetch(true);
    	if ($memorando){
			(new Alert())->setAlert("A referente <strong>{$this->referente}</strong> está vinculada a um memorando","danger");
			return false;
    	} else {
    		(new Alert())->setAlert("referente {$this->referente} Deletada","success");
			return parent::destroy();    		
    	}    	
    }

    public function save(): bool
    {    	
		if (parent::save()) {
			(new Alert())->setAlert("referente <strong>{$this->referente}</strong> Salva","success");
			return true;
		} else {
			(new Alert())->setAlert("Não foi possivel Salvar referente <strong>{$this->referente}</strong>","warning");
			return false;
		}	    
	}
}