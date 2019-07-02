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
SELECT grupos.nome AS nome, s.pontos AS pontos FROM grupos
INNER JOIN (SELECT colaboradores_has_grupos.grupos_id AS id, SUM(colaboradores.pontos) AS pontos
FROM colaboradores_has_grupos
LEFT JOIN colaboradores ON colaboradores.id = colaboradores_has_grupos.colaboradores_id
GROUP BY colaboradores_has_grupos.grupos_id) AS s ON grupos.id = s.id
WHERE grupos.status = 0
ORDER BY pontos DESC
S;

$r = $conn->query($q);

$data = [];

while ($row = $r->fetch_assoc())
{
    $rowa = [];

    $rowa['points'] = $row['pontos'];
    $rowa['group'] = $row['nome'];

    array_push($data, $rowa);
}

echo json_encode($data);
?>