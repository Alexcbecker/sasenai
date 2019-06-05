<?php
$con = mysqli_connect("localhost","root","root","bd_fito");

$select1 = mysqli_query($con,"SELECT * FROM  campanhas ORDER BY nome");

$campanhas = array();

while($linha1 = mysqli_fetch_array($select1,MYSQLI_ASSOC)){
	array_push($campanhas,$linha1);
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
	</script>

</head>

<body>
	<div class="container">

		<div class="borda" style=" margin-top:3%;">
			<form action='goals/back_cadastro_metas.php' method='post'>
				<h1>Cadastro de metas</h1>
				<div class="form-group">
					<label for="exampleFormControlInput1">Nome da meta</label>
					<input type="text" class="form-control" name='nome' id="nomeItemDigital">
				</div>
				<div class="form-group">
					<label for="exampleF ormControlTextarea1">Pontos da meta</label>
					<input type="number" class="form-control" name='pontos' id="valorItemDigital">
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Descrição da meta</label>
					<textarea class="form-control" name='descricao' id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">Campanha</label>
					<select name="campanhas" class="custom-select custom-select-lg mb-3">
						<?php
						foreach($campanhas as $key => $value){
						?>
							<option value="<?php echo $value["id"]; ?>" selected><?php echo $value["nome"]; ?></option>
							<?php } ?>
					</select>
				</div>
				<?php
				if(isset($_GET['mensagem'])){
					?>
                    <option value="<?php echo $value["id"]; ?>" selected><?php echo $value["nome"]; ?></option>
                    <?php
    }
    ?>
                  </select>
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
            </form>
        </div>
    </div>
</body>

</html>
