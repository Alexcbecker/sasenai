<?php

$con = mysqli_connect("localhost","root","root","bd_fito");

$select1 = mysqli_query($con,"SELECT * FROM  grupos");

$grupo = array();

while($linha1 = mysqli_fetch_array($select1,MYSQLI_ASSOC)){
	array_push($grupo,$linha1);
}


$select = mysqli_query($con,"SELECT * FROM colaboradores WHERE tipo IN (3,2) ORDER BY nome");

$colaborador = array();

while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
	array_push($colaborador,$linha);
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

$( document ).ready(function() {
  $("#select_grupo_chosen, #select_colaborador_chosen").click(function(ev){
    if(ev.target.parentElement.parentElement.parentElement.id == "select_grupo_chosen"){
      $('#select_grupo').prop('disabled', false).trigger("liszt:updated");
      $('#select_grupo').prop('disabled', false).trigger("chosen:updated");

      $('#select_colaborador').val('');
      $('#select_colaborador').prop('disabled', true).trigger("liszt:updated");
      $('#select_colaborador').prop('disabled', true).trigger("chosen:updated");
    }
    else {
      $('#select_grupo').val('');
      $('#select_grupo').prop('disabled', true).trigger("liszt:updated");
      $('#select_grupo').prop('disabled', true).trigger("chosen:updated");

      $('#select_colaborador').prop('disabled', false).trigger("liszt:updated");
      $('#select_colaborador').prop('disabled', false).trigger("chosen:updated");
    }


  })
});

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

        <div  class="form-group">
          <label  for="exampleFormControlInput1">Grupos</label>
          <select id="select_grupo" name='select_grupo[]' class="form-control form-control-chosen" data-placeholder="Selecione o Grupo" multiple required="required">
            <?php
  					foreach($grupo as $key => $value){

  					?>
            <option value="<?php echo $value["id"]; ?>" ><?php echo $value["nome"]; ?></option>
            <?php
            }
            ?>
          </select>
        </div>


        <div  class="form-group">
          <label  for="exampleFormControlInput1">Colaboradores</label>
          <select id="select_colaborador" name='select_colaborador[]'  class="form-control form-control-chosen" data-placeholder="Selecione o colaborador" multiple required="required">
            <?php

            foreach($colaborador as $key => $value){

            ?>
            <option  value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
            <?php
            }
            ?>
          </select>
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
					<label  for="exampleFormControlInput1">Tipo de pontuação</label>
					<select id="tipo_pontuacao" name='tipo_pontuacao'  class="form-control form-control-chosen" data-placeholder="Selecione o método" required="required">
						<option value="Valor">Valor</option>
						<option value="Quantidade">Quantidade</option>
					</select>
				</div>

				<div class="form-row">
          <div class="col">
            <label for="pontuacao"></label>
            Pontuacao  <input type="text" name='bonificacao' class="form-control" id="pontuacao" placeholder="pontuação" required="required">
          </div>
          <div class="col">
            <label for="variante_de_pontos"></label>
            Variante de Pontos <input type="text" name='variante_pontos' class="form-control" id="variante_de_pontos" placeholder="variante de pontos" required="required">
          </div>
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
