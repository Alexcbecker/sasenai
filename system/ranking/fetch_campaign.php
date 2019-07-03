<?php
include '../base_db.php';

$q = "SELECT id, nome, descricao, tipo_participantes FROM campanhas WHERE campanhas.nome = '{$_GET['name']}'";

$result = $conn->query($q);

$data = [];

if ($row = $result->fetch_assoc())
{
    $data['id'] = $row['id'];
    $data['name'] = $row['nome'];
    $data['description'] = $row['descricao'];
    $data['user_type'] = $row['tipo_participantes'] == 0 ? 'Individual' : 'Grupo';
}

echo json_encode($data);
?>
