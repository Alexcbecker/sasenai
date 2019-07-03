<?php
include '../../base_db.php';

$q =  "SELECT * FROM grupos WHERE nome = '{$_POST['name']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $q =  "INSERT INTO grupos (nome, descricao) VALUES ('{$_POST['name']}', '{$_POST['desc']}')";

    $result = $conn->query($q);

    echo "status:ok";   
}

?>
