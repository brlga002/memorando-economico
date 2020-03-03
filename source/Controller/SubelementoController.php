<?php


namespace Source\Controller;


use Source\Models\Subelemento;

class SubelementoController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function home(): void
    {   
        $subelementos = ((new subelemento))->find()->fetch(true);

        echo $this->view->render("subelemento/home",[
            "title" => "Home subelemento | ". SITE,
            "subelementos" => $subelementos
        ]);
    }

    public function new(): void
    {          
        echo $this->view->render("subelemento/new",[
            "title" => "Novo subelemento | ". SITE
        ]);
    }

    public function edit(array $data): void
    {          
        $subelemento = (new subelemento())->findById($data["id"]);
  
        echo $this->view->render("subelemento/edit",[
            "title" => "Editar subelemento | ". SITE,
            "subelemento" => $subelemento
        ]);
    }
    
    public function store(): void
    {        
        $subelemento = new subelemento();
        $subelemento->subelemento = filter_input(INPUT_POST, "subelemento", FILTER_SANITIZE_STRIPPED);
        $subelemento->save();                    
        
        $this->router->redirect("subelemento.home");
    }

    public function update(array $data): void
    {          
        $subelemento = (new subelemento())->findById($data["id"]);
        $subelemento->subelemento = filter_input(INPUT_POST, "subelemento", FILTER_SANITIZE_STRIPPED);
        $subelemento->save();

        $this->router->redirect("subelemento.home");
    }

    public function delete(array $data): void
    {          
        $subelemento = (new subelemento())->findById($data["id"]);
        $subelemento->destroy();        
        $this->router->redirect("subelemento.home");  
    }    
}?>


 