<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Nova</strong> Referente
    </div>
    <form action="<?= $router->route("referente.store"); ?>" method="post" class="">
      <div class="card-body card-block">
        <div class="form-group">
          <label for="referente" class=" form-control-label">Referente</label>
          <input type="text" id="referente" name="referente" class="form-control" required>
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

