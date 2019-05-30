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

$sx = $_POST['sex'] == 'male' ? 1 : 2;

$q = "insert into colaboradores (id, email, senha, cpf, nome, tipo, sexo, status, pontos, creditos)
values (null, '{$_POST['email']}', '{$_POST['password']}', '{$_POST['cpf']}', '{$_POST['name']}', '{$_POST['usertype']}', {$sx}, 0, 0, 0)";

$status = "";

if ($conn->query($q) === TRUE) $status = "usradded";


header('Location: tela_cadastro_adm.php?status={$status}');
?>
