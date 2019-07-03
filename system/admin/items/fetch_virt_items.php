<?php
include '../../base_db.php';

const slots = ["Fundo", "Corpo", "Pés", "Pernas", "Torso", "Cabelo", "Acessórios de cabeça", "Acessórios gerais"];

$q = "SELECT nome, valor, caminho, id, slot FROM itens WHERE tipo=1 ORDER BY nome";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while ($row = $result->fetch_assoc())
    {
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['value'] = $row['valor'];
        $rowa['slot'] = slots[(int)$row['slot']];
        $rowa['image_path'] = $row['caminho'];

        array_push($data, $rowa);
    }
}

echo json_encode($data);
?>
