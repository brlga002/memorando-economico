<?php $v->layout("_theme"); ?>

<div class="col-lg-12">
  <h1>Home</h1>
  <a href="<?= $router->route("memorando.new") ?>" class="btn btn-success"> <i class="menu-icon fa fa-plus"></i>Novo Memorando </a>
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Listagem de Memos</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>N°</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Referente</th>            
            <th>Favorefido</th>
            <th></th>            
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
                <td><?= date("d/m/Y",strtotime($memorando->dataMemorando)) ?></td>
                <td><?= formataMoeda($memorando->valor,false)?></td>
                <td><?= $memorando->referente() ?> <?= $memorando->referenteComplemento ?></td>
                <td><?= $memorando->favorecido() ?></td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.edit",$memorando->id); ?>" class="btn btn-secondary btn-sm">
                  <i class="fa fa-edit"></i></a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.delete",$memorando->id); ?>" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i></a>
                </td>
                <td>
                  <a href="<?= $rota->bindRota("memorando.geraDocumento",$memorando->id); ?>" class="btn btn-info btn-sm">
                  <i class="fa fa-file-text-o"></i></a>
                </td>
                <td>
                    <a href="#" class="btn btn-info btn-sm"
                       data-acao="Update link modal."
                       data-urlMemoEconomico="<?= $rota->bindRota("etiqueta.show",''); ?>"
                       data-memorandoId="<?= $memorando->id; ?>"
                    <i class="fa fa-file"></i></a>
                    </a>
                </td>
              </tr>
            <?php endforeach?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<!-- The Modal -->
<div class="modal" id="acaoModal" >
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Impressão de Etiqueta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Selecione uma posição etiqueta</p>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico1"  href="#">
                        1
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico2"  href="#">
                        2
                    </a>
                </div>
                <br><br>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico3"  href="#">
                        3
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico4"  href="#">
                        4
                    </a>
                </div>
                <br><br>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico5"  href="#">
                        5
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-primary btn-block" id="urlMemoEconomico6"  href="#">
                        6
                    </a>
                </div>
                <br><br>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>




<script>
    $(function () {
        $("body").on("click", "[data-acao]", function (e) {
            e.preventDefault();
            var data = $(this).data();
            console.log(data);
            var urlMemoEconomico1 = $("#urlMemoEconomico1");
            var urlMemoEconomico2 = $("#urlMemoEconomico2");
            var urlMemoEconomico3 = $("#urlMemoEconomico3");
            var urlMemoEconomico4 = $("#urlMemoEconomico4");
            var urlMemoEconomico5 = $("#urlMemoEconomico5");
            var urlMemoEconomico6 = $("#urlMemoEconomico6");

            urlMemoEconomico1.attr("href",data["urlmemoeconomico"]+'0/'+data["memorandoid"]);
            urlMemoEconomico2.attr("href",data["urlmemoeconomico"]+'1/'+data["memorandoid"]);
            urlMemoEconomico3.attr("href",data["urlmemoeconomico"]+'2/'+data["memorandoid"]);
            urlMemoEconomico4.attr("href",data["urlmemoeconomico"]+'3/'+data["memorandoid"]);
            urlMemoEconomico5.attr("href",data["urlmemoeconomico"]+'4/'+data["memorandoid"]);
            urlMemoEconomico6.attr("href",data["urlmemoeconomico"]+'5/'+data["memorandoid"]);

            $("#acaoModal").modal()
        });
    });
</script>