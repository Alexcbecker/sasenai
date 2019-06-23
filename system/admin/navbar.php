

<?php
include "../../database/autenticacao/sessaovalidate.php";
?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-default-blue navbar-fixed-top" style="background-color: #00a7e1;">

      <a class="navbar-brand" href="navbar.php?folder=&file=admin.php">
        <img src="../../images/image_login/logo_fito.png" width="30" height="30" class="dinline-block align-top"
        alt="random image"> Olá <?php echo $_SESSION['nome']; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link"aria-haspopup="true" href="navbar.php?folder=&file=tela_cadastro_pontos.php">Pontos</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Usuários
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="navbar.php?folder=users_cad&file=tela_cadastro_usuario.php">Cadastro de usuário</a>
            <a class="dropdown-item" href="navbar.php?folder=users_cad&file=tela_editar_usuario.php">Editar usuário</a>
          </div>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Grupos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="navbar.php?folder=teams&file=tela_cadastro_grupo.php">Cadastro de grupo</a>
            <a class="dropdown-item" href="navbar.php?folder=teams&file=tela_editar_grupo.php">Editar grupo</a>
          </div>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Campanhas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="navbar.php?folder=campaigns&file=cadastro_campanhas_front.php">Cadastro de campanha</a>
            <a class="dropdown-item" href="navbar.php?folder=campaigns&file=tela_editar_campanha.php">Editar campanha</a>
          </div>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Metas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="navbar.php?folder=goals&file=cadastro_metas.php">Cadastro de meta</a>
            <a class="dropdown-item" href="navbar.php?folder=goals&file=tela_editar_meta.php">Editar meta</a>
          </div>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Itens
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="navbar.php?folder=items&file=tela_cadastro_item.php">Cadastro de item</a>
            <a class="dropdown-item" href="navbar.php?folder=items&file=tela_editar_item.php">Editar item</a>
          </div>

          <li class="nav-item active">
            <a class="nav-link" href="../../database/autenticacao/logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <?php
          if (isset($_GET['folder'])  &&  isset($_GET['file'])) {
            if (@include $_GET['folder']."/".$_GET['file']) {

            }
          }else{

          }
          ?>
        </div>
      </div>
    </div>

</body>
</html>
