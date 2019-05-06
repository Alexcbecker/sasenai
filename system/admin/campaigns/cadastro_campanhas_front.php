<html>
<head>
  <link href="../../css/componente_multiselecao.css" rel="stylesheet">

  <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">
</head>


<body>

  <div class="container">

    <div class="borda" style=" margin-top:3%;">


      <form>
        <h1>CADASTRO DE CAMPANHAS</h1>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome da campanha</label>
          <input type="text" class="form-control" name="nome_campanha" id="nome_campanha" placeholder="De um nome a campanha">
        </div>
        <div  class="form-group">
          <label  for="exampleFormControlInput1">Metas</label>
          <select id="multiple" class="form-control form-control-chosen" data-placeholder="Selecione a meta" multiple>
            <option></option>
            <option>Meta One</option>
            <option>Meta Two</option>
            <option>Meta Three</option>
            <option>Meta Four</option>
            <option>Meta Five</option>
            <option>Meta Six</option>
            <option>Meta Seven</option>
            <option>Meta Eight</option>
          </select>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline1">Quantidade</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline2">Valor</label>
        </div>
        <div  class="form-group">
          <label  for="exampleFormControlInput1">Grupos</label>
          <select id="multiple" class="form-control form-control-chosen" data-placeholder="Selecione o Grupo" multiple>
            <option></option>
            <option>Grupos One</option>
            <option>Grupos Two</option>
            <option>Grupos Three</option>
            <option>Grupos Four</option>
            <option>Grupos Five</option>
            <option>Grupos Six</option>
            <option>Grupos Seven</option>
            <option>Grupos Eight</option>
          </select>
        </div>
        <div  class="form-group">
          <label  for="exampleFormControlInput1">Colaboradores</label>
          <select id="multiple" class="form-control form-control-chosen" data-placeholder="Selecione o colaborador" multiple>
            <option></option>
            <option>Colaboradores One</option>
            <option>Colaboradores Two</option>
            <option>Colaboradores Three</option>
            <option>Colaboradores Four</option>
            <option>Colaboradores Five</option>
            <option>Colaboradores Six</option>
            <option>Colaboradores Seven</option>
            <option>Colaboradores Eight</option>
          </select>
        </div>
        <div class="form-row">
          <div class="col">
            Inicio <input type="date" class="form-control" placeholder="">
          </div>
          <div class="col">
            Fim <input type="date" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label for="pontuacao"></label>
            Pontuacao  <input type="text" class="form-control" id="pontuacao" placeholder="pontuacao">
          </div>
          <div class="col">
            <label for="variante_de_pontos"></label>
            Variante de Pontos <input type="text" class="form-control" id="variante_de_pontos" placeholder="variante de pontos">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descricao</label>
          <textarea class="form-control" id="descricao" rows="3"></textarea>
        </div>
        <div>
          <button type="button" class="btn btn-primary">Cadastrar</button>
          <button type="button" class="btn btn-danger">Cancelar</button
          </div>
        </div>
      </form>


    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
  <script type="text/javascript">
  $('.form-control-chosen').chosen();
  </script>

</body>


</html>
