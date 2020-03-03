<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="<?= $router->route("home") ?>">Controle</a>
      <a class="navbar-brand hidden" href="<?= $router->route("home") ?>"><img src="<?= url("theme/dashboard/")?>images/logo2.png" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?= $router->route("home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Memorandos </a></li>       
        <li class=""><a href="<?= $router->route("memorando.new") ?>"> <i class="menu-icon fa fa-plus"></i>Novo Memorando </a></li>       
        <div class="menu-title"></div>
        <li class=""><a href="<?= $router->route("favorecido.home") ?>"> <i class="menu-icon fa fa-cog"></i>Favorecidos </a></li>       
        <li class=""><a href="<?= $router->route("favorecido.new") ?>"> <i class="menu-icon fa fa-plus"></i>Novo favorecido </a></li>       
        <div class="menu-title"></div>
        <li class=""><a href="<?= $router->route("conta.home") ?>"> <i class="menu-icon fa fa-cog"></i>Contas </a></li>       
        <li class=""><a href="<?= $router->route("conta.new") ?>"> <i class="menu-icon fa fa-plus"></i>Nova conta</a></li> 
        <div class="menu-title"></div>
        <li class=""><a href="<?= $router->route("referente.home") ?>"> <i class="menu-icon fa fa-cog"></i>Referentes </a></li>       
        <li class=""><a href="<?= $router->route("referente.new") ?>"> <i class="menu-icon fa fa-plus"></i>Novo referente </a></li>
        <div class="menu-title"></div>
        <li class=""><a href="<?= $router->route("subelemento.home") ?>"> <i class="menu-icon fa fa-cog"></i>Subelementos </a></li>       
        <li class=""><a href="<?= $router->route("subelemento.new") ?>"> <i class="menu-icon fa fa-plus"></i>Novo subelemento </a></li>       
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside><!-- /#left-panel -->