<?php
include '../../base_db.php';

const $slots = ["Fundo", "Corpo", "Pés", "Pernas", "Torso", "Cabelo", "Acessórios de cabeça", "Acessórios gerais"];

$q = "SELECT nome, valor, quantidade, caminho, id FROM itens WHERE nome='{$_GET['name']}' AND tipo=2";

$result = $conn->query($q);

$data = [];

if ($row = $result->fetch_assoc())
{
    $data['id'] = $row['id'];
    $data['name'] = $row['nome'];
    $data['value'] = $row['valor'];
    $data['slot'] = $slots[$row['slot']];
    $data['image_path'] = $row['caminho'];
}

echo json_encode($data);
?>
