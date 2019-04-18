<?php

$con = mysqli_connect("localhost","root","root","bd_fito");

$bd_fito = mysqli_query($con,"SELECT * FROM colaboradores");

$lider = array();

while($linha = mysqli_fetch_array($bd_fito,MYSQLI_ASSOC)){
	array_push($lider,$linha);
}


?>

<html>

<head>

<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">


  <link href="../css/componente_multiselecao.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style_base_cadastro_editar.css">


</head>

<body>



        <?php include_once("../navbar.php"); ?>


        <div class="container">

            <div class="borda" style=" margin-top:3%;">
                <form action='insert.php' method='POST'>
                    <h1>Cadastro de grupos</h1>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome do grupo</label>
                        <input type="text" class="form-control" name="nomeGrupo"  required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição do grupo</label>
                        <textarea class="form-control" name="descricaoGrupo"  required></textarea>
                    </div>




        <div>
            <button type="submit" class="btn btn-primary btn-md">Cadastrar Time</button>
            <button type="submit" class="btn btn-primary btn-md">Cancelar</button>

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
