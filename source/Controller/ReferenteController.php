<?php


namespace Source\Controller;


use Source\Models\Referente;

class ReferenteController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function home(): void
    {   
        $referentes = ((new Referente))->find()->fetch(true);

        echo $this->view->render("referente/home",[
            "title" => "Home referente | ". SITE,
            "referentes" => $referentes
        ]);
    }

    public function new(): void
    {          
        echo $this->view->render("referente/new",[
            "title" => "Novo referente | ". SITE
        ]);
    }

    public function edit(array $data): void
    {          
        $referente = (new Referente())->findById($data["id"]);
  
        echo $this->view->render("referente/edit",[
            "title" => "Editar referente | ". SITE,
            "referente" => $referente
        ]);
    }
    
    public function store(): void
    {        
        $referente = new Referente();
        $referente->referente = filter_input(INPUT_POST, "referente", FILTER_SANITIZE_STRIPPED);
        $referente->save();                    
        
        $this->router->redirect("referente.home");
    }

    public function update(array $data): void
    {          
        $referente = (new Referente())->findById($data["id"]);
        $referente->referente = filter_input(INPUT_POST, "referente", FILTER_SANITIZE_STRIPPED);
        $referente->save();

        $this->router->redirect("referente.home");
    }

    public function delete(array $data): void
    {          
        $referente = (new Referente())->findById($data["id"]);
        $referente->destroy();        
        $this->router->redirect("referente.home");  
    }    
}?>


 