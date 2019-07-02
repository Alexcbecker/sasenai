<?php
include '../../base_db.php';

$q = "DELETE FROM itens WHERE nome = '{$_POST['name']}'";

$conn->query($q);

echo "status:ok";
?>