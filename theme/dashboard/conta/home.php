<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>Contas</h1>
  <a href="<?= $router->route("conta.new") ?>" class="btn btn-success"> <i class="menu-icon fa fa-plus"></i>Nova conta</a>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Contas</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Contas</th>       
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($contas)) :?>
            <?php foreach ($contas as $key => $conta) : ?> 
              <tr>
                <th scope="row"><?= $conta->id ?></th>
                <td><?= $conta->conta ?></td>                
                <td>
                  <a href="<?= $rota->bindRota("conta.edit",$conta->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("conta.delete",$conta->id); ?>" class="btn btn-danger btn-sm">
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
