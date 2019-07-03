<?php
include '../../base_db.php';

$q =  "SELECT * FROM campanhas WHERE nome = '{$_POST['name']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $type = $_POST['type'] == "Invividual" ? 0 : 1;

    $q =  "INSERT INTO campanhas (nome, descricao, data_inicial, data_final, tipo_participantes) VALUES ('{$_POST['name']}', '{$_POST['desc']}', '{$_POST['date_start']}', '{$_POST['date_end']}', $type)";

    $conn->query($q);
    
    if ($conn->affected_rows == 1) echo "status:ok";
    else echo "status:error";
}

?>
