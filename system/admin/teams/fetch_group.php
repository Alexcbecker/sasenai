<?php
include '../../base_db.php';

$q =  "SELECT id, nome, descricao, status FROM grupos WHERE nome = '{$_GET['name']}'";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    if ($row = $result->fetch_assoc())
    {
        $data['id'] = $row['id'];
        $data['name'] = $row['nome'];
        $data['desc'] = $row['descricao'];
        $data['status'] = $row['status'] == 0 ? 'Ativo' : 'Desativado';
    }
}

echo json_encode($data);

?>
