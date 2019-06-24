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
SELECT colaboradores.nome AS nome, s.pontos AS pontos FROM colaboradores
INNER JOIN (SELECT colaboradores_id AS id, SUM(pontos_conquistados) AS pontos FROM metas_has_colaboradores
LEFT JOIN (SELECT id FROM metas WHERE metas.campanhas_id = '{$_GET['id']}') AS m ON m.id = metas_has_colaboradores.metas_id
GROUP BY metas_has_colaboradores.colaboradores_id) AS s ON s.id = colaboradores.id
ORDER BY s.pontos DESC
S;

$r = $conn->query($q);

$data = [];

while ($row = $r->fetch_assoc())
{
    $rowa = [];

    $rowa['name'] = $row['nome'];
    $rowa['points'] = $row['pontos'];

    array_push($data, $rowa);
}

echo json_encode($data);
?>