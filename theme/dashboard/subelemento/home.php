<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>subelementos</h1>
  <a href="<?= $router->route("subelemento.new") ?>" class="btn btn-success"> <i class="menu-icon fa fa-plus"></i>Novo subelemento </a>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de subelementos</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>subelementos</th>       
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($subelementos)) :?>
            <?php foreach ($subelementos as $key => $subelemento) : ?> 
              <tr>
                <th scope="row"><?= $subelemento->id ?></th>
                <td><?= $subelemento->subelemento ?></td>                
                <td>
                  <a href="<?= $rota->bindRota("subelemento.edit",$subelemento->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("subelemento.delete",$subelemento->id); ?>" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>&nbsp;Deletar</a>
                </td>
              </tr>
            <?php endforeach?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
