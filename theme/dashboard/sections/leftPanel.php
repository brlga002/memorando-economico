<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="<?= url("manage") ?>">Controle</a>
      <a class="navbar-brand hidden" href="<?= url("manage") ?>"><img src="<?= url("theme/dashboard/")?>images/logo2.png" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= $router->route("home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Home </a></li>       
        <li class="active"><a href="<?= $router->route("memorando.new") ?>"> <i class="menu-icon fa fa-dashboard"></i>Novo Memorando </a></li>       
        <li class="active"><a href="<?= $router->route("favorecido.home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Favorecidos </a></li>       
        <li class="active"><a href="<?= $router->route("favorecido.new") ?>"> <i class="menu-icon fa fa-dashboard"></i>Novo favorecido </a></li>       
        <li class="active"><a href="<?= $router->route("conta.home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Contas </a></li>       
        <li class="active"><a href="<?= $router->route("conta.new") ?>"> <i class="menu-icon fa fa-dashboard"></i>Nova conta</a></li>       
        <li class="active"><a href="<?= $router->route("referente.home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Referentes </a></li>       
        <li class="active"><a href="<?= $router->route("referente.new") ?>"> <i class="menu-icon fa fa-dashboard"></i>Novo referente </a></li>
        <li class="active"><a href="<?= $router->route("subelemento.home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Subelementos </a></li>       
        <li class="active"><a href="<?= $router->route("subelemento.new") ?>"> <i class="menu-icon fa fa-dashboard"></i>Novo subelemento </a></li>       
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside><!-- /#left-panel -->