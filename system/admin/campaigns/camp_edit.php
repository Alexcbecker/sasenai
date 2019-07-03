<?php
include '../../base_db.php';


$q =  "SELECT * FROM campanhas WHERE nome = '{$_POST['name']}' AND id != '{$_POST['id']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $type = $_POST['type'] == "Invividual" ? 0 : 1;

    $q =  "UPDATE campanhas SET nome = '{$_POST['name']}', descricao = '{$_POST['desc']}', data_inicial = '{$_POST['date_start']}', data_final = '{$_POST['date_end']}', tipo_participantes = $type WHERE id = {$_POST['id']}";

    $result = $conn->query($q);

    if ($conn->affected_rows == 1) echo "status:ok";
    else echo "status:error";
}

?>
