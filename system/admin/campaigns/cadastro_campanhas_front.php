<?php

$con = mysqli_connect("localhost","root","root","bd_fito");

$select1 = mysqli_query($con,"SELECT * FROM  grupos");

$grupo = array();

while($linha1 = mysqli_fetch_array($select1,MYSQLI_ASSOC)){
	array_push($grupo,$linha1);
}



 ?>

<html>
<head>
  <link href="../../css/componente_multiselecao.css" rel="stylesheet">

  <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">


<script>

function validar(){
var t1= document.getElementById("t1").value;
var t2= document.getElementById("t2").value;


if(t1 > t2) {
document.getElementById("t2").value = '';
document.getElementById('t2').focus();

}else{
}
}

</script>﻿

</head>

<body>

  <div class="container">

    <div class="borda" style=" margin-top:3%;">


      <form action='campaigns/criar.php' method='post'>
        <h1>CADASTRO DE CAMPANHAS</h1>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome da campanha</label>
          <input type="text" class="form-control" name="nome_campanha" id="nome_campanha" placeholder="De um nome a campanha" required="required">
        </div>

        <div class="form-row">
          <div class="col">
            Inicio <input type="date" name='dataInicio' id="t1" class="form-control" placeholder="" required="required" onblur="validar()">
          </div>
          <div class="col">
            Fim <input type="date" name='dataFim' id="t2" class="form-control" placeholder="" required="required" onblur="validar()">
          </div>
        </div>


				<div  class="form-group">
					<label  for="exampleFormControlInput1">Tipos de participantes</label>
					<select id="tipo_participante" name='tipo_participante'  class="form-control form-control-chosen" data-placeholder="Selecione o método" required="required">
						<option value="individual">Individual</option>
						<option value="grupo">Em grupo</option>
					</select>
				</div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descricao</label>
          <textarea class="form-control" name='descricao' id="descricao" rows="3" required="required"></textarea>
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
