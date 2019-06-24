<html>
  <head>
    <meta charset="utf-8">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" type="text/css" href="../../css/style_base_cadastro_editar.css">
  </head>
  <body>
    <?php
    session_start();

    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $cpf = $_SESSION['cpf'];
    $tipo = $_SESSION['tipo'];
    $sexo = $_SESSION['sexo'];
    $pontos = $_SESSION['pontos'];
    $creditos = $_SESSION['creditos'];
    $confirmar_nvsenha['confirmar nova senha'];

    if ($tipo == 1) {
      $tipo = "Administrador";

    } elseif ($tipo == 2) {
      $tipo = "Lider";

    }else {
      $tipo = "Colaborador";
    }

    if ($sexo == 1) {
      $sexo = "Masculino";
    }else {
      $sexo = "Feminino";
    }
     ?>
<div class="borda" style="margin-top:3%">
    <h6>
      <div class="form-group">
      <label for="exampleInputEmail1">Nome:</label>
      <?php echo $nome ?>
    </div>
    <div class="form-group">

      <?php echo $senha ?>

      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Email:</label>
      <?php echo $email ?>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">cpf:</label>
      <?php echo $cpf ?>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Tipo:</div</label>
      <?php echo $tipo ?>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Sexo:</label>
      <?php echo $sexo ?>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Pontos:</label>
      <?php echo $pontos ?>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Creditos:</label>
      <?php echo $creditos ?>
    </div>
    <?php
    if(isset($_GET['mensagem'])){
    ?>
    <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
      <?php echo $_GET['mensagem']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
    </div>
    <?php
    }
    ?>

    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
      Alterar Senha
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>



          <div class="modal-body">
              <form  action="editar_senha.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Senha atual</label>
    <input type="password" class="form-control" name="senha" id="exampleInputEmail1"  placeholder="" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nova senha</label>
    <input type="password" class="form-control" name="nova_senha" id="exampleInputPassword1" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmar nova senha</label>
      <input type="password" class="form-control" name="confirmar_nvsenha" id="exampleInputPassword1" placeholder="" required>
      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar Senha</button>
          </div>
    </form>
        </div>
      </div>
    </div>

    <script>
    $('#modalEditar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var senha = button.data('whatevernome')
    var confirmar_senha = button.data('whatevervalor')
    var modal = $(this)
    modal.find('.modal-title').text('Editar senha ')
    modal.find('#recipient-nome').val(senha)
    modal.find('#recipient-valor').val(confirmar_senha)
    })
    </script>

  </h6>

</div>
  </body>
</html>
