<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html>

<head>
	<meta charset="utf-8">

	<link href="../../css/componente_multiselecao.css" rel="stylesheet">

	<link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">

</head>

<body>

	<div class="container">
		<div class="borda" style=" margin-top:3%;">

			<?php
                $sx = $_POST['sex'] == 'male' ? 1 : 2;

                $q = "insert into colaboradores (id, email, senha, cpf, nome, tipo, sexo, status, pontos, creditos)
                values (null, '{$_POST['email']}', '{$_POST['password']}', '{$_POST['cpf']}', '{$_POST['name']}', '{$_POST['usertype']}', {$sx}, 0, 0, 0)";

                if ($conn->query($q) === TRUE) echo "";
          ?>

		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
	<script type="text/javascript">
		$('.form-control-chosen').chosen();
	</script>

</body>

</html>
