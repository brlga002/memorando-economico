<?php


namespace Source\Controller;


use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Models\DataStart;
use Source\Models\Memorando;
use Source\Support\Image;
use Source\Support\Alert;
use Source\Support\Rota;

abstract class Controller
{
    /** @var Engine */
    protected $view;

    /** @var Router */
    protected $router;

    /** @var Image */
    protected $c;

    /** @var Alert */
    protected $alert;

    public function __construct($router, $dir = null, $globals = [])
    {
        $dir = $dir ?? dirname(__DIR__,2) . "/theme/dashboard/";
        $this->view = Engine::create($dir,"php");
        $this->router = $router;
        $this->view->addData(["rota" => (new Rota($this->router))]);
        $this->view->addData(["alert" => (new Alert())]);
        $this->view->addData(["router" => $this->router]);

        new DataStart();
    }

    public function home(): void
    {   
        $memorandos = ((new Memorando))->find()->order("id DESC")->fetch(true);

        echo $this->view->render("home",[
            "title" => "Home | ". SITE,
            "memorandos" => $memorandos
        ]);
    }

   public function error(array $data): void
   {
        echo $this->view->render("error",[
            "title" => "Error | ". SITE,
            "error" => $data["errcode"]
        ]);
   }

    

}