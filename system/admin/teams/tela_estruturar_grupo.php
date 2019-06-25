<?php

$con = mysqli_connect("localhost","root","root","bd_fito");

$select = mysqli_query($con,"SELECT id,nome FROM colaboradores WHERE tipo='3' ORDER BY nome");

$colaborador = array();

while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
	array_push($colaborador,$linha);
}

$select = mysqli_query($con,"SELECT id,nome FROM colaboradores WHERE tipo='2' ORDER BY nome");

$lider = array();

while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
	array_push($lider,$linha);
}

$select1 = mysqli_query($con,"SELECT * FROM  grupos ORDER BY nome");

$grupo = array();

while($linha1 = mysqli_fetch_array($select1,MYSQLI_ASSOC)){
	array_push($grupo,$linha1);
}
?>

<html>

<head>

  <link href="../../css/componente_multiselecao.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">


</head>

<body>
<div class="borda" style=" margin-top:3%;">

	<form action='teams/estruturar_grupo.php' method="post">

        <div class="container">
        <h1>Editar grupos</h1>
			<div class="form-group">
				<label for="exampleFormControlInput1">Grupo</label>
				<select name="grupo" class="custom-select custom-select-lg mb-3" required="required">
					<option selected>...</option>
				<?php foreach($grupo as $key => $value){ ?>

					<option value="<?php echo $value["id"]; ?>" ><?php echo $value["nome"]; ?></option>
                <?php } ?>


				</select>
            </div>

            <div class="form-group">
            <label for="exampleFormControlInput1">Líder</label>
            <select name="lider" class="custom-select custom-select-lg mb-3" required="required">
							<option selected>...</option>

				<?php foreach($lider as $key => $value){ ?>
                <option  value="<?php echo $value["id"]; ?>" ><?php echo $value["nome"]; ?></option>
                <?php } ?>

            </select>
            </div>

            <div  class="form-group">
            <label  for="exampleFormControlInput1">Usuários</label>
            <select id="multiple" name="usuarios[]" class="form-control form-control-chosen" data-placeholder="Por favor, selecione..."  multiple="multiple" required="required">
				<?php foreach($colaborador as $key => $value){ ?>

				<option  value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
            <?php } ?>
            </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-md">Inserir</button>
                <button type="submit" class="btn btn-danger btn-md">Cancelar</button>
            </div>
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
