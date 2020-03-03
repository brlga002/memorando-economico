<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Nova</strong> subelemento
    </div>
    <form action="<?= $router->route("subelemento.store"); ?>" method="post" class="">
      <div class="card-body card-block">
        <div class="form-group">
          <label for="subelemento" class=" form-control-label">subelemento</label>
          <input type="text" id="subelemento" name="subelemento" class="form-control" required>
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

