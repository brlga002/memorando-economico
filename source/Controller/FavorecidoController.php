<?php


namespace Source\Controller;


use Source\Models\Favorecido;

class FavorecidoController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function home(): void
    {   
        $favorecidos = ((new Favorecido))->find()->order("favorecido ASC")->fetch(true);

        echo $this->view->render("favorecido/home",[
            "title" => "Home Favorecido | ". SITE,
            "favorecidos" => $favorecidos
        ]);
    }

    public function new(): void
    {          
        echo $this->view->render("favorecido/new",[
            "title" => "Novo Favorecido | ". SITE
        ]);
    }

    public function edit(array $data): void
    {          
        $favorecido = (new Favorecido())->findById($data["id"]);
  
        echo $this->view->render("favorecido/edit",[
            "title" => "Editar Favorecido | ". SITE,
            "favorecido" => $favorecido
        ]);
    }
    
    public function store(): void
    {        
        $favorecido = new Favorecido();
        $favorecido->favorecido = filter_input(INPUT_POST, "favorecido", FILTER_SANITIZE_STRIPPED);
        $favorecido->save();                    
        
        $this->router->redirect("favorecido.home");
    }

    public function update(array $data): void
    {          
        $favorecido = (new Favorecido())->findById($data["id"]);
        $favorecido->favorecido = filter_input(INPUT_POST, "favorecido", FILTER_SANITIZE_STRIPPED);
        $favorecido->save();

        $this->router->redirect("favorecido.home");
    }

    public function delete(array $data): void
    {          
        $favorecido = (new Favorecido())->findById($data["id"]);
        $favorecido->destroy();        
        $this->router->redirect("favorecido.home");  
    }    
}?>


 