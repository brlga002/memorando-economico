<?php
use \CoffeeCode\Router\Router;
require __DIR__ . "/vendor/autoload.php";

$route = new Router(ROOT);

$route->namespace("Source\Controller");

$route->group(null);
    $route->get("/", "MemorandoController:home","home");

$route->group("memorando");
    $route->get("/novo", "MemorandoController:formNew","memorando.new");    
    $route->post("/store", "MemorandoController:store","memorando.store");    
    $route->get("/edit/{id}", "MemorandoController:formEdit","memorando.edit");    
    $route->get("/delete/{id}", "MemorandoController:delete","memorando.delete");    
    $route->post("/update/{id}", "MemorandoController:update","memorando.update");    
    $route->get("/geraDocumento/{id}", "MemorandoController:geraDocumento","memorando.geraDocumento");    

$route->group("favorecido");
    $route->get("/", "FavorecidoController:home","favorecido.home");    
    $route->get("/novo", "FavorecidoController:new","favorecido.new");    
    $route->post("/store", "FavorecidoController:store","favorecido.store");    
    $route->get("/edit/{id}", "FavorecidoController:edit","favorecido.edit");    
    $route->get("/delete/{id}", "FavorecidoController:delete","favorecido.delete");    
    $route->post("/update/{id}", "FavorecidoController:update","favorecido.update");   

$route->group("conta");
    $route->get("/", "ContaController:home","conta.home");    
    $route->get("/novo", "ContaController:new","conta.new");    
    $route->post("/store", "ContaController:store","conta.store");    
    $route->get("/edit/{id}", "ContaController:edit","conta.edit");    
    $route->get("/delete/{id}", "ContaController:delete","conta.delete");    
    $route->post("/update/{id}", "ContaController:update","conta.update");  

$route->group("referente");
    $route->get("/", "ReferenteController:home","referente.home");    
    $route->get("/novo", "ReferenteController:new","referente.new");    
    $route->post("/store", "ReferenteController:store","referente.store");    
    $route->get("/edit/{id}", "ReferenteController:edit","referente.edit");    
    $route->get("/delete/{id}", "ReferenteController:delete","referente.delete");    
    $route->post("/update/{id}", "ReferenteController:update","referente.update");  

$route->group("subelemento");
    $route->get("/", "SubelementoController:home","subelemento.home");    
    $route->get("/novo", "SubelementoController:new","subelemento.new");    
    $route->post("/store", "SubelementoController:store","subelemento.store");    
    $route->get("/edit/{id}", "SubelementoController:edit","subelemento.edit");    
    $route->get("/delete/{id}", "SubelementoController:delete","subelemento.delete");    
    $route->post("/update/{id}", "SubelementoController:update","subelemento.update");

$route->group("etiqueta");
    $route->get("/{id0}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}/{id2}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}/{id2}/{id3}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}/{id2}/{id3}/{id4}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}/{id2}/{id3}/{id4}/{id5}", "EtiquetaController:show","etiqueta.show");
    $route->get("/{id0}/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}", "EtiquetaController:show","etiqueta.show");



/* Error */
$route->group("ops");
    $route->get("/{errcode}", "MemorandoController:error");

$route->dispatch();

if ($route->error()) {
    //$route->redirect("/ops/{$route->error()}");
}