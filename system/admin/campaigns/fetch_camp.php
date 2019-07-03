<?php
include '../../base_db.php';

$q =  "SELECT * FROM campanhas WHERE nome = '{$_GET['name']}'";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    if ($row = $result->fetch_assoc())
    {
        $data['id'] = $row['id'];
        $data['name'] = $row['nome'];
        $data['desc'] = $row['descricao'];
        $data['date_start'] = $row['data_inicial'];
        $data['date_end'] = $row['data_final'];
        $data['type'] = $row['tipo_participantes'] == 0 ? "Invividual" : "Grupo"; 
    }
}

echo json_encode($data);

?>