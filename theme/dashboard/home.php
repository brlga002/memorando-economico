<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>Home</h1>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Memos</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">N°</th>
            <th>Data</th>
            <th>Valor</th>
            <th>N° doc.</th>
            <th>Desc.</th>
            <th>Arquivo</th>            
            <th></th>            
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($memorandos)) :?>
            <?php foreach ($memorandos as $key => $memorando) : ?> 
              <tr>
                <th scope="row"><?= $memorando->id ?></th>
                <td><?= $memorando->numero ?></td>                
                <td><?= formataData($memorando->dataMemorando) ?></td>
                <td><?= $memorando->valor ?></td>
                <td><?= $memorando->nDoc ?></td>
                <td><?= $memorando->nomeArquivo ?></td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.edit",$memorando->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.delete",$memorando->id); ?>" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>&nbsp;Deletar</a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.geraDocumento",$memorando->id); ?>" class="btn btn-info btn-sm">
                  <i class="fa fa-file-text-o"></i>&nbsp;Gera</a>
                </td>
              </tr>
            <?php endforeach?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
