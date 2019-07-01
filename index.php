<html>
<head>

  <title>!!!BEM-VINDO AO FITO!!!</title>

  <link rel="stylesheet" href="css/style_login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script>
        $(document).ready(function () { 
            var $seuCampoCpf = $("#cpf");
            //$seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });
    </script>
</head>
<?php 
session_start();
unset($_SESSION);
session_destroy();
?>

<body style="background-color: #00a7e1;">
  <div class="container">
    <center>
    <img src="images/image_login/logo_fito.png" width=”20px” height=”20px” >
  </center>
  </div>

<div class="box">

          <form name="login" action="database/autenticacao/login_autenticacao.php" method="post">
            <div class="form-group">
              <label>CPF</label>
              <input type="text" name="cpf" class="form-control" id="cpf"  >
            </div>
            <div class="form-group">
              <label>Senha</label>
              <input type="password" name="senha" class="form-control" id="Senha" >
            </div>
            <div class="form-group ">
              <a data-toggle="modal" data-target="#myModal" href="#" >Esqueci a senha</a>

            </div>
            <?php
            if(isset($_GET['mensagem'])){
              ?>
              <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
                <?php echo $_GET['mensagem']; ?>
              </div>
              <?php
            }
            ?>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
</div>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Esqueci a senha</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form >
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Digite seu e-mail:</label>
      <input type="text" class="form-control" id="recipient-name">
      <small id="emailHelp" class="form-text text-muted">Sua senha será enviada para seu e-mail.</small>
    </div>
  </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-primary">Enviar</button>
</div>
</div>
</div>
</div>
</body>

</html>
