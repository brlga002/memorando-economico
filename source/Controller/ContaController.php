<?php


namespace Source\Controller;


use Source\Models\Conta;

class ContaController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function home(): void
    {   
        $contas = ((new Conta))->find()->fetch(true);

        echo $this->view->render("conta/home",[
            "title" => "Home conta | ". SITE,
            "contas" => $contas
        ]);
    }

    public function new(): void
    {          
        echo $this->view->render("conta/new",[
            "title" => "Novo conta | ". SITE
        ]);
    }

    public function edit(array $data): void
    {          
        $conta = (new Conta())->findById($data["id"]);
  
        echo $this->view->render("conta/edit",[
            "title" => "Editar conta | ". SITE,
            "conta" => $conta
        ]);
    }
    
    public function store(): void
    {        
        $conta = new Conta();
        $conta->conta = filter_input(INPUT_POST, "conta", FILTER_SANITIZE_STRIPPED);
        $conta->save();                    
        
        $this->router->redirect("conta.home");
    }

    public function update(array $data): void
    {          
        $conta = (new Conta())->findById($data["id"]);
        $conta->conta = filter_input(INPUT_POST, "conta", FILTER_SANITIZE_STRIPPED);
        $conta->save();

        $this->router->redirect("conta.home");
    }

    public function delete(array $data): void
    {          
        $conta = (new Conta())->findById($data["id"]);
        $conta->destroy();        
        $this->router->redirect("conta.home");  
    }    
}?>


 