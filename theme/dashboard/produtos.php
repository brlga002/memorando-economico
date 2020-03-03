<?php $v->layout("_theme"); ?>

<div class="col-lg-8">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Produtos</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Produto</th>
            <th>Imagem</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Desc.</th>
            <th>Vlr. C desconto</th>
            <th>% Desc.</th>
            <th>Descrição</th>            
            <th></th>            
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <?php if(isset($produtos)) :?>
            <?php foreach ($produtos as $key => $cat) : ?> 
              <tr>
                <th scope="row"><?= $cat->id ?></th>
                <td><?= $cat->nomeProduto ?></td>                
                <td><img src="<?= $c->make($cat->imagemProduto,50,50) ?>"></td>
                <td><?= $cat->nomeCategoria ?></td>
                <td><?= $cat->valor ?></td>
                <td><?= $cat->desconto ?></td>
                <td><?= $cat->valorComDesconto ?></td>
                <td><?= $cat->procentagemDesconto ?></td>
                <td><?= $cat->descricao ?></td>
                <td>
                  <a href="<?= url("manage/produtos/editar/{$cat->id}") ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i>&nbsp; Editar</a>
                </td>
                <td>
                  <a href="<?= url("manage/produtos/deletar/{$cat->id}") ?>" class="btn btn-danger btn-sm">
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

<div class="col-lg-4">
  <div class="card">
    <div class="card-header">
      <strong>Novo</strong> Produto
    </div>
    <form action="<?= url("manage/produtos/nova") ?>" method="post" class="">
      <div class="card-body card-block">
        <div class="form-group">
          <label for="nomeProduto" class=" form-control-label">Nome</label>
          <input type="text" id="nomeProduto" name="nomeProduto" placeholder="Nome do Produto" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="valor" class=" form-control-label">Valor</label>
          <input type="number" min="0" step="0.01" id="valor" name="valor" placeholder="Valor do Produto" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="desconto" class=" form-control-label">Vlr. do Desconto</label>
          <input type="number" min="0" step="0.01" value="0" id="desconto" name="desconto" placeholder="Valor do Desconto do Produto" class="form-control" value="0" required >
        </div>

        <div class="form-group">
          <label for="valorComDesconto" class=" form-control-label">Vlr. Com Desconto</label>
          <input type="number" min="0" step="0.01" id="valorComDesconto" name="valorComDesconto" placeholder="Valor do Desconto do Produto" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="porcentagemDesconto" class=" form-control-label">% Porcentagem de Desconto</label>
          <input type="number" min="0" max="100" step="0.01" value="0" id="porcentagemDesconto" name="porcentagemDesconto" placeholder="Valor do Desconto do Produto" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="descricao" class=" form-control-label">Descricao</label>
          <textarea id="descricao" name="descricao" placeholder="Descricao do Produto" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <input type="hidden" id="imagemProduto" name="imagemProduto">
          <label for="nomeImagem" class=" form-control-label">Imagem do Produto</label>
          <card>
            <img id="nomeImagem"  class="form-control" src="<?= $c->make('selecioneImagem.jpg',362,236) ?>" data-toggle="modal" data-target="#scrollmodal">            
          </card>
        </div>

        <div class="form-group">
          <select required class="form-control" id="idCategoria" name="idCategoria">
            <option value="">Escolha uma categoria</option>
          <?php foreach ($categorias as $key => $categoria) : ?>
            <option value="<?= $categoria->id ?>"><?= $categoria->nomeCategoria ?></option>
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

<?php $v->insert("sections/modalSelectImage"); ?>