<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  != session_id()) die;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
mysqli_set_charset($conn, "utf8");

$q = <<<S
UPDATE colaboradores_has_grupos
SET colaboradores_has_grupos.status = 1
WHERE colaboradores_has_grupos.colaboradores_id IN (SELECT id FROM colaboradores WHERE cpf = {$_POST['value']})
S;

$conn->query($q);

echo "status:ok";

?>
