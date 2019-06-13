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

$q = "SELECT * FROM campanhas WHERE campanhas.nome = '{$_GET['name']}'";

$result = $conn->query($q);

$data = [];

if ($row = $result->fetch_assoc())
{
    $data['name'] = $row['nome'];
    $data['description'] = $row['descricao'];
    $data['type'] = $row['tipo'] == 1 ? 'Valor' : 'Quantidade';
    $data['bonus'] = $row['bonificacao'];
    $data['user_type'] = $row['tipo_participantes'] == 0 ? 'Individual' : 'Grupo';
}

echo json_encode($data);
?>
