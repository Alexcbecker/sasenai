<html>

<head>
	<meta charset="utf-8">

	<link href="../../css/componente_multiselecao.css" rel="stylesheet">

	<link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">

</head>

<body>


	<div class="container">
		<div class="borda" style=" margin-top:3%;">
			<form action="users/cadastro_adm.php" method="post">
				<h1>Cadastro</h1>
				<div class="form-group">
					<label for="name">Nome</label>
					<input type="text" class="form-control" name="name" id="name" required>
				</div>

				<div class="form-group">
					<label for="cpf">Cpf</label>
					<input type="number" class="form-control" name="cpf" id="cpf" required>
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control" name="email" id="email" required>
				</div>

				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" class="form-control" name="password" id="password" required>
				</div>

				<fieldset class="form-group">
					<div class="row">
						<legend class="col-form-label col-sm-1 pt-0">Sexo</legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="male" value="male" required>
								<label class="form-check-label" for="male">
									Masculino
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="female" value="female" required>
								<label class="form-check-label" for="female">
									Feminino
								</label>
							</div>
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<div class="row">
						<legend class="col-form-label col-sm-1 pt-0">Tipo de usuário</legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="usertype" id="admin" value="1" required>
								<label class="form-check-label" for="admin">
									Administrador
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="usertype" id="fher" value="2" required>
								<label class="form-check-label" for="fher">
									Lider
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="usertype" id="colab" value="3" required>
								<label class="form-check-label" for="colab">
									Colaborador comum
								</label>
							</div>
						</div>
					</div>
				</fieldset>

				<div>
					<button type="submit" class="btn btn-primary">Cadastrar</button>
					<button type="button" class="btn btn-danger">Cancelar</button </div>
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
