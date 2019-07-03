<?php
include '../../base_db.php';

$q = "SELECT nome, valor, quantidade, caminho, id FROM itens WHERE tipo=2 ORDER BY nome";

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
        $rowa['amount'] = $row['quantidade'];
        $rowa['image_path'] = $row['caminho'];

        array_push($data, $rowa);
    }
}

echo json_encode($data);
?>
