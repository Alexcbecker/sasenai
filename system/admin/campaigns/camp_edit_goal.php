<?php
include '../../base_db.php';

$q =  "SELECT * FROM metas WHERE nome = '{$_POST['name']}' AND campanhas_id != {$_POST['camp_id']}";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $q =  "UPDATE metas SET nome = '{$_POST['name']}', descricao = '{$_POST['desc']}', pontos = {$_POST['points']}, objetivo = {$_POST['objective']} WHERE id = {$_POST['id']}";

    $conn->query($q);
    
    if ($conn->affected_rows == 1) echo "status:ok";
    else echo "status:error";
}

?>
