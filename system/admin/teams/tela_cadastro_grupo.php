<html>

<head>

  
  <link href="../../css/componente_multiselecao.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">


</head>

<body>


<div class="container">


            <div class="borda" style=" margin-top:3%;">
                <form>
                    <h1>Cadastro de Times</h1>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome do time</label>
                        <input type="text" class="form-control" name="nomeTime" id="nomeTime">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição do time</label>
                        <textarea class="form-control" name="descricaoTime" id="descricaoTime"></textarea>
                    </div>



            <div class="form-group">
            <label for="exampleFormControlInput1">Lider</label>
            <select class="custom-select custom-select-lg mb-3">
                <option selected>Lider</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

            </div>

            <div  class="form-group">
            <label  for="exampleFormControlInput1">Usuarios:</label>
            <select id="multiple" class="form-control form-control-chosen" data-placeholder="Please select..." multiple>
                <option></option>
                <option>Option One</option>
                <option>Option Two</option>
                <option>Option Three</option>
                <option>Option Four</option>
                <option>Option Five</option>
                <option>Option Six</option>
                <option>Option Seven</option>
                <option>Option Eight</option>
            </select>
            </div>

        <div>
            <button type="button" class="btn btn-primary btn-md">Cadastrar Time</button>
            <button type="button" class="btn btn-primary btn-md">Cancelar</button>

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
