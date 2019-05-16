<html>

<head>
  <meta charset="utf-8">
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
      <form>
        <h1>Cadastro de metas</h1>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome da meta</label>
          <input type="text" class="form-control" id="nomeItemDigital">
        </div>

        <div class="form-group">
          <label for="exampleF ormControlTextarea1">Pontos da meta</label>
          <input type="number" class="form-control" id="valorItemDigital">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Campanha</label>
        <select class="custom-select custom-select-lg mb-3">
            <option selected>Campanhas</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descrição da meta</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>


    <div>
      <button type="button" class="btn btn-primary btn-md">Cadastrar meta</button>
      <button type="button" class="btn btn-danger btn-md">Cancelar</button>

    </div>
</div>
  </form>
</div>






</body>

</html>
