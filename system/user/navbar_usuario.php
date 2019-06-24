<?php
include "../../database/autenticacao/sessaovalidate.php";
?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="../jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

   <form>

     <nav  class="navbar navbar-expand-lg navbar-dark bg-default-blue navbar-static-top" style="background-color: #00a7e1;">


        <a class="navbar-brand" href="navbar_usuario.php?folder=&file=avatar_screen.php">
        <img src="../../images/image_login/logo_fito.png" width="31" height="31" class="dinline-block align-top" alt="random image">
        Olá <?php echo $_SESSION['nome']; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="navbar_usuario.php?folder=../ranking&file=ranking.html">Ranking</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbar_usuario.php?folder=&file=back_perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">campanhas e metas</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="../../database/autenticacao/logout.php">Sair</a>
                </li>
                </ul>

                <span class="navbar-text ml-1" style="width: 150px;">
                capointes: <?php echo $_SESSION['pontos']; ?>
                </span>

                <span class="navbar-text" style="width: 150px;">
                Pontos: <?php echo $_SESSION['creditos']; ?>
                </span>
        </div>
    </nav>

<div class="container-fluid">
  <div class="row justify-content">
    <div class="col-12">
      <?php
      if (isset($_GET['folder'])  &&  isset($_GET['file'])) {
        if (@include $_GET['folder']."/".$_GET['file']) {

        }
      }else{
        header("Location: navbar_usuario.php?folder=&file=avatar_screen.php");
      }
      ?>
    </div>
  </div>
</div>

</form>
</body>
</html>
