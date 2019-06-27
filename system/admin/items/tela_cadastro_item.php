<html>
<head>
  <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">
  <script>

  $(document).ready(function () {
    $('.custom-file-input').on('change', function () {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

  });
  </script>
</head>
<body>
  <div class="container">
    <div class="borda" style=" margin-top:3%;">
      <form action="items/upload_imagem.php" method="post" enctype="multipart/form-data">
        <h1>Cadastro de Itens</h1>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome do item</label>
          <input type="text" class="form-control" name="nomeItemDigital" id="nomeItemDigital">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Valor do item</label>
          <input type="number" class="form-control" name="valorItemDigital" id="valorItemDigital">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Quantidade</label>
          <input type="number" class="form-control" name="quantidadeItemDigital" id="quantidadeItemDigital">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Adicionar imagem</label>
          <div class="custom-file" id="customFile" lang="es">
            <input type="file" accept="image/x-png,image/jpeg" name="imagemItemDigital" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label text-truncate"  for="validatedCustomFile">Adicionar imagem...</label>
          </div>
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
          <button type="submit" class="btn btn-primary btn-md">Cadastrar item</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
