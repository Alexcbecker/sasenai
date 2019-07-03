<?php
include '../../base_db.php';

$q =  "SELECT * FROM metas WHERE nome = '{$_GET['name']}' AND campanhas_id = {$_GET['camp_id']}";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    if ($row = $result->fetch_assoc())
    {
        $data['id'] = $row['id'];
        $data['name'] = $row['nome'];
        $data['desc'] = $row['descricao'];
        $data['objective'] = $row['objetivo'];
        $data['points'] = $row['pontos'];
    }
}

echo json_encode($data);

?>
