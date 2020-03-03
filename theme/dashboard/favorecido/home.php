<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>Favorecidos</h1>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Favorecidos</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Favorecidos</th>       
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($favorecidos)) :?>
            <?php foreach ($favorecidos as $key => $favorecido) : ?> 
              <tr>
                <th scope="row"><?= $favorecido->id ?></th>
                <td><?= $favorecido->favorecido ?></td>                
                <td>
                  <a href="<?= $rota->bindRota("favorecido.edit",$favorecido->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("favorecido.delete",$favorecido->id); ?>" class="btn btn-danger btn-sm">
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
