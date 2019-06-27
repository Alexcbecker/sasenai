<html>

<head>
<link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">
</head>

<body>
<div class="borda" style=" margin-top:3%;">
        <form action='teams/back_cadastro_grupo.php' method='post'>
          <h1>Cadastro de grupos</h1>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nome do grupo</label>
            <input type="text" class="form-control"  name="nome_grupo" id="nome_grupo" placeholder="De um nome ao grupo" >
          </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descrição</label>
              <textarea class="form-control" name='descricao_grupo' id="descricao_grupo"  placeholder="Descreva seu grupo" rows="3"></textarea>
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
          <div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
    <script type="text/javascript">
        $('.form-control-chosen').chosen();
    </script>

</body>

</html>
