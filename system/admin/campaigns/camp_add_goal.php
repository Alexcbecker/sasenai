<?php
include '../../base_db.php';

$q =  "SELECT * FROM metas WHERE nome = '{$_POST['name']}' AND campanhas_id = {$_POST['camp_id']}";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $q =  "INSERT INTO metas (nome, descricao, pontos, objetivo, campanhas_id) VALUES ('{$_POST['name']}', '{$_POST['desc']}', {$_POST['points']}, {$_POST['objective']}, {$_POST['camp_id']})";

    $conn->query($q);
    
    if ($conn->affected_rows == 1) echo "status:ok";
    else echo "status:error";
}

?>
