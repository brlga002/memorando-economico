<?php $v->layout("_theme"); ?>

<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Editar</strong> Memorando
    </div>
    <form action="<?= $rota->bindRota("memorando.update",$memorando->id); ?>" method="post" class="">
      <div class="card-body card-block">
        <div class="form-group">
          <label for="memorando" class=" form-control-label">N° memorando</label>
          <input type="text" id="memorando" name="memorando" value="<?= $memorando->numero ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dataMemorando" class=" form-control-label">Data Memorando</label>
          <input type="date" name="dataMemorando" value="<?= $memorando->dataMemorando ?>" class="form-control" required>          
        </div>
        <div class="form-group">
          <label for="valor" class=" form-control-label">Valor</label>
          <input type="number" step="0.01" min="0" id="valor" name="valor" value="<?= $memorando->valor ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nDoc" class=" form-control-label">N° Doc</label>
          <input type="text" id="nDoc" name="nDoc" value="<?= $memorando->nDoc ?>" class="form-control" required>
        </div>

        <div class="form-group">
        <select required class="form-control" id="referente" name="referente">          
          <option value="">Escolha uma referente</option>
        <?php foreach ($referente as $key => $referente) : ?>            
          <option value="<?= $referente->id ?>" <?= ($memorando->id_referente == $referente->id) ? "selected" : "" ; ?>>
            <?= $referente->referente ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

        <div class="form-group">
        <select required class="form-control" id="conta" name="conta">
          <option value="">Escolha uma conta</option>
        <?php foreach ($conta as $key => $conta) : ?>            
          <option value="<?= $conta->id ?>" <?= ($memorando->id_conta == $conta->id) ? "selected" : "" ; ?>>
            <?= $conta->conta ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

        <div class="form-group">
        <select required class="form-control" id="favorecido" name="favorecido">
          <option value="">Escolha uma favorecido</option>
        <?php foreach ($favorecido as $key => $favorecido) : ?>            
          <option value="<?= $favorecido->id ?>" <?= ($memorando->id_favorecido == $favorecido->id) ? "selected" : "" ; ?>>
            <?= $favorecido->favorecido ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

         
        <div class="form-group">
        <select required class="form-control" id="subelemento" name="subelemento">
          <option value="">Escolha uma subelemento</option>
        <?php foreach ($subelemento as $key => $subelemento) : ?>            
          <option value="<?= $subelemento->id ?>" <?= ($memorando->id_subelemento == $subelemento->id) ? "selected" : "" ; ?>>
            <?= $subelemento->subelemento ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" id="btn-salvar" class="btn btn-success btn-sm"  dwisabled="disabled">
          <i class="fa fa-dot-circle-o"></i> Salvar
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Limpar
        </button>
      </div>
    </form>
  </div>
</div>

