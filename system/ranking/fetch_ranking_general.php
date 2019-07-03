<?php
include '../base_db.php';

$q = "SELECT * FROM colaboradores WHERE colaboradores.status = 0 AND colaboradores.tipo != 1 ORDER BY pontos DESC";

$result = $conn->query($q);

$data = [];

$rowa = [];

while ($row = $result->fetch_assoc())
{
    $rowa['name'] = $row['nome'];
    $rowa['points'] = $row['pontos'];
    $rowa['credit'] = $row['creditos'];

    array_push($data, $rowa);
}

echo json_encode($data);
?>
