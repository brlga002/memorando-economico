<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Novo</strong> Memo
    </div>
    <form action="<?= $router->route("memorando.store"); ?>" method="post" class="">
      <div class="card-body card-block">
        <div class="form-group">
          <label for="memorando" class=" form-control-label">N° memorando</label>
          <input type="text" id="memorando" name="memorando" value="<?= $proximoNumero ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dataMemorando" class=" form-control-label">Data Memorando</label>
          <input type="date" name="dataMemorando" class="form-control" value="<?= date("Y-m-d"); ?>" required>          
        </div>
        <div class="form-group">
          <label for="valor" class=" form-control-label">Valor</label>
          <input type="number" step="0.01" min="0" id="valor" name="valor" class="form-control" required>
        </div>
          <div class="form-group">
              <label for="numeroProcesso" class=" form-control-label">Nº Processo</label>
              <input type="text" id="numeroProcesso" name="numeroProcesso"  value="00<?= $proximoNumero ?>/2020" class="form-control" required>
          </div>
        <div class="form-group">
          <label for="nDoc" class=" form-control-label">N° Doc</label>
          <input type="text" id="nDoc" name="nDoc" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="referente" class=" form-control-label">Referente</label>
        <select required class="form-control" id="referente" name="referente">
          <option value="">Escolha uma referente</option>
        <?php foreach ($referente as $key => $referente) : ?>            
          <option value="<?= $referente->id ?>">
            <?= $referente->referente ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>
        <div class="form-group">
          <label for="referenteComplemento" class=" form-control-label">Complemento Referente</label>
          <input type="text" id="referenteComplemento" name="referenteComplemento" class="form-control">
        </div>

        <div class="form-group">
        <label for="competencia" class="form-control-label">Competência MES/ANO</label>
        <select class="form-control" id="competencia" name="competencia">
              <option value=""></option>
              <option value="JAN/2020">JAN/2020</option>
              <option value="FEV/2020">FEV/2020</option>
              <option value="MAR/2020">MAR/2020</option>
              <option value="ABR/2020">ABR/2020</option>
              <option value="MAI/2020">MAI/2020</option>
              <option value="JUN/2020">JUN/2020</option>
              <option value="JUL/2020">JUL/2020</option>
              <option value="AGO/2020">AGO/2020</option>
              <option value="SET/2020">SET/2020</option>
              <option value="OUT/2020">OUT/2020</option>
              <option value="NOV/2020">NOV/2020</option>
              <option value="DEZ/2020">DEZ/2020</option>
        </select>
        </div>

        <div class="form-group">
        <label for="conta" class="form-control-label">Conta</label>
        <select required class="form-control" id="conta" name="conta">
          <option value=""></option>
        <?php foreach ($conta as $key => $conta) : ?>            
          <option value="<?= $conta->id ?>">
            <?= $conta->conta ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

        <div class="form-group">
        <label for="favorecido" class="form-control-label">Favorecido</label>
        <select required class="form-control" id="favorecido" name="favorecido">
          <option value=""></option>
        <?php foreach ($favorecido as $key => $favorecido) : ?>            
          <option value="<?= $favorecido->id ?>">
            <?= $favorecido->favorecido ?>
          </option>
        <?php endforeach ?>  
        </select>
        </div>

         
        <div class="form-group">
        <label for="subelemento" class="form-control-label">Subelemento</label>
        <select required class="form-control" id="subelemento" name="subelemento">
          <option value=""></option>
        <?php foreach ($subelemento as $key => $subelemento) : ?>            
          <option value="<?= $subelemento->id ?>">
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

