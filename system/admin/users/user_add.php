<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$status = "error";

$q = "SELECT cpf FROM colaboradores WHERE cpf='{$_POST['cpf']}'";

$r = $conn->query($q);

if ($r->num_rows == 0)
{
    $sx = $_POST['sex'] == 'Masculino' ? 1 : 2;
    $ty = $_POST['usertype'] == 'Administrador' ? '1' : ($_POST['usertype'] == 'Líder' ? '2' : '3');

    $q = "INSERT INTO colaboradores (id, email, senha, cpf, nome, tipo, sexo, status, pontos, creditos)
    VALUES (null, '{$_POST['email']}', '{$_POST['password']}', '{$_POST['cpf']}', '{$_POST['name']}', {$ty}, {$sx}, 0, 0, 0)";

    if ($conn->query($q) === TRUE) $status = "ok";
}
else $status = "cpfinvalid";

echo "status:{$status}";
?>
