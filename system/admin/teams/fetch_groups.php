<?php
include '../../base_db.php';

$q =  "SELECT id, nome, descricao, status FROM grupos ORDER BY nome";

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
        $rowa['status'] = $row['status'] == 0 ? 'Ativo' : 'Desativado';

        array_push($data, $rowa);
    }
}

echo json_encode($data);

?>
