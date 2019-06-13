<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  != session_id()) die("session error");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
mysqli_set_charset($conn, "utf8");

$q = "SELECT * FROM campanhas";

$result = $conn->query($q);

$data = [];

$rowa = [];

while ($row = $result->fetch_assoc())
{
    $rowa['name'] = $row['nome'];
    $rowa['description'] = $row['descricao'];
    $rowa['type'] = $row['tipo'] == 1 ? 'Valor' : 'Quantidade';
    $rowa['bonus'] = $row['bonificacao'];
    $rowa['user_type'] = $row['tipo_participantes'] == 0 ? 'Individual' : 'Grupo';

    array_push($data, $rowa);
}

echo json_encode($data);
?>
