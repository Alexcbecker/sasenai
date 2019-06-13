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
SELECT grupos.nome AS nome, s.pontos AS camp_pontos FROM grupos
LEFT JOIN (SELECT colaboradores_has_grupos.grupos_id AS id, SUM(colaboradores.pontos) AS pontos
FROM colaboradores_has_grupos
LEFT JOIN (

    SELECT colaboradores_has_campanhas.pontos_desta_campanha AS camp_pontos
    FROM ((colaboradores_has_campanhas
LEFT JOIN colaboradores ON colaboradores.id = colaboradores_has_campanhas.colaboradores_id)
INNER JOIN campanhas ON campanhas.id = colaboradores_has_campanhas.campanhas_id)
WHERE campanhas.nome = '{$_GET['name']}')


) as y ON y.id = colaboradores_has_grupos.colaboradores_id
GROUP BY colaboradores_has_grupos.grupos_id


) AS s ON s.id = grupos.id
WHERE grupos.status = 0
ORDER BY s.pontos DESC
S;

$r = $conn->query($q);

echo $conn->error;

$data = [];

while ($row = $r->fetch_assoc())
{
    $rowa = [];

    $rowa['name'] = $row['nome'];
    $rowa['points'] = $row['camp_pontos'];
    $rowa['campaign'] = $row['camp_nome'];

    array_push($data, $rowa);
}

echo json_encode($data);
?>