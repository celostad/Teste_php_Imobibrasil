<?php
switch ($pagina) {

  case "cad-imovel": $cad_imob="active"; break;
  case "cad-midia": $cad_midia="active"; break;

  default:
    $home="active"; break; //aria-current='page'
}
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://www.imobibrasil.com.br/" target="_blank"><h1>ImobiBrasil</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $home; ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $cad_imob; ?>" href="imoveis-cadastro.php" title="Adicionar Residência">Adicionar Residência</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $cad_midia; ?>" href="midias-cadastro.php" title="Anexar Documentos">Anexar Documentos</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="index.php" method="post">
        <input class="form-control me-2" type="search" name="pesquisa" placeholder="Procurar Residência!" aria-label="Search">
        <button class="btn btn-outline-success" name="enviar type="submit">Pesquisar</button>        
      </form>
    </div>
  </div>
</nav>
