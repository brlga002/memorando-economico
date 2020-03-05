<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>Referentes</h1>
  <a href="<?= $router->route("referente.new") ?>" class="btn btn-success"> <i class="menu-icon fa fa-plus"></i>Novo referente </a>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Referentes</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Referentes</th>       
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($referentes)) :?>
            <?php foreach ($referentes as $key => $referente) : ?> 
              <tr>
                <th scope="row"><?= $referente->id ?></th>
                <td><?= $referente->referente ?></td>                
                <td>
                  <a href="<?= $rota->bindRota("referente.edit",$referente->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("referente.delete",$referente->id); ?>" class="btn btn-danger btn-sm">
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
