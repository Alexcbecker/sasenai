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

$q = <<<S
SELECT colaboradores.nome AS c_nome, colaboradores_has_campanhas.pontos_desta_campanha AS camp_pontos, campanhas.nome AS camp_nome
FROM ((colaboradores_has_campanhas
INNER JOIN colaboradores ON colaboradores.id = colaboradores_has_campanhas.colaboradores_id)
INNER JOIN campanhas ON campanhas.id = colaboradores_has_campanhas.campanhas_id)
WHERE colaboradores.status = 0
ORDER BY colaboradores_has_campanhas.pontos_desta_campanha DESC
S;

$r = $conn->query($q);

$data = [];

while ($row = $r->fetch_assoc())
{
    $rowa = [];

    $rowa['name'] = $row['c_nome'];
    $rowa['points'] = $row['camp_pontos'];
    $rowa['campaign'] = $row['camp_nome'];

    array_push($data, $rowa);
}

echo json_encode($data);
?>