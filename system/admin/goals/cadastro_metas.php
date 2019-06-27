<?php
$con = mysqli_connect("localhost","root","root","bd_fito");
$select1 = mysqli_query($con,"SELECT * FROM  campanhas ORDER BY nome");
$campanhas = array();
while($linha1 = mysqli_fetch_array($select1,MYSQLI_ASSOC)){
	array_push($campanhas,$linha1);
}


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
	<link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">
	<script>

	$(document).ready(function () {
		$('.custom-file-input').on('change', function () {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});
	});
	$(function(){

		$('#select_grupo').prop('disabled', true).trigger("chosen:updated");
		$('#select_colaborador').prop('disabled', true).trigger("chosen:updated");

		$("#campanhas").change(function(){
			var tipo_participantes = $('option:selected', this).data('tipo');

			if(tipo_participantes==0){
				$('#select_grupo').val('');
				$('#select_grupo').prop('disabled', true).trigger("liszt:updated");
				$('#select_grupo').prop('disabled', true).trigger("chosen:updated");

				$('#select_colaborador').prop('disabled', false).trigger("liszt:updated");
				$('#select_colaborador').prop('disabled', false).trigger("chosen:updated");
			}else if(tipo_participantes==1){
				$('#select_grupo').prop('disabled', false).trigger("liszt:updated");
				$('#select_grupo').prop('disabled', false).trigger("chosen:updated");

				$('#select_colaborador').val('');
				$('#select_colaborador').prop('disabled', true).trigger("liszt:updated");
				$('#select_colaborador').prop('disabled', true).trigger("chosen:updated");
			}else{
				$('#select_colaborador').val('');
				$('#select_colaborador').prop('disabled', true).trigger("liszt:updated");
				$('#select_colaborador').prop('disabled', true).trigger("chosen:updated");
				$('#select_grupo').val('');
				$('#select_grupo').prop('disabled', true).trigger("liszt:updated");
				$('#select_grupo').prop('disabled', true).trigger("chosen:updated");
			}
		})
	})
	</script>
<link href="../../css/componente_multiselecao.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="borda" style=" margin-top:3%;">
			<form action='goals/back_cadastro_metas.php' method='post'>
				<h1>Cadastro de Metas</h1>
				<div class="form-group">
					<label for="exampleFormControlInput1">Nome da meta</label>
					<input type="text" class="form-control" name='nome' id="nomeMeta" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Campanha</label>
					<select name="campanhas" class="custom-select custom-select-lg mb-3" id="campanhas" required>
						<option >Selecione a Campanha</option>
						<?php
							foreach($campanhas as $key => $value){
							?>
							<option value="<?php echo $value["id"]; ?>" data-tipo="<?php echo $value["tipo_participantes"]; ?>" ><?php echo $value["nome"]; ?></option>
						<?php } ?>
					</select>
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
				<div  class="form-group">
					<label  for="exampleFormControlInput1">Tipo de pontuação</label>
					<select id="tipo_pontuacao" name='tipo_pontuacao'  class="form-control form-control-chosen" data-placeholder="Selecione o método" required="required">
						<option value="1">Valor</option>
						<option value="2">Quantidade</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleF ormControlTextarea1">Pontos da meta</label>
					<input type="number" class="form-control" name='pontos' id="pontosMetas" required>
				</div>
				<div class="form-group">
					<label for="exampleF ormControlTextarea1">Objetivo</label>
					<input type="number" class="form-control" name='objetivo' id="objetivo" required>
				</div>

				<div class="form-row">
					<div class="col">
						<label for="pontuacao"></label>
						Bonificação  <input type="number"  name='bonificacao' class="form-control" id="pontuacao" placeholder="Pontuação" required="required">
					</div>
					<div class="col">
						<label for="variante_de_pontos"></label>
						Variante de Pontos <input type="number" name='variante_pontos' class="form-control" id="variante_de_pontos" placeholder="Variante de pontos" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Descrição da meta</label>
					<textarea class="form-control" name='descricao' id="descricaoMetas" rows="3" required></textarea>
				</div>

				<?php
				if(isset($_GET['mensagem'])){
					?>
					<div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
						<?php echo $_GET['mensagem']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
				}
				?>
				<div>
					<button type="submit" class="btn btn-primary btn-md">Cadastrar meta</button>
					<button type="submit" class="btn btn-danger">Cancelar</button>
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
