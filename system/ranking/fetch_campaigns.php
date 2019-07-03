<?php
include '../base_db.php';

$q = "SELECT id, nome, tipo_participantes, descricao FROM campanhas";

$result = $conn->query($q);

$data = [];

$rowa = [];

while ($row = $result->fetch_assoc())
{
    $rowa['id'] = $row['id'];
    $rowa['name'] = $row['nome'];
    $rowa['description'] = $row['descricao'];
    $rowa['user_type'] = $row['tipo_participantes'] == 0 ? 'Individual' : 'Grupo';

    array_push($data, $rowa);
}

echo json_encode($data);
?>
