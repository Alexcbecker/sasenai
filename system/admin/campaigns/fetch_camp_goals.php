<?php
include '../../base_db.php';

$q =  "SELECT * FROM metas WHERE campanhas_id = {$_GET['camp_id']} ORDER BY nome";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while ($row = $result->fetch_assoc())
    {
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['desc'] = $row['descricao'];
        $rowa['objective'] = $row['objetivo'];
        $rowa['points'] = $row['pontos'];

        array_push($data, $rowa);
    }
}

echo json_encode($data);

?>
