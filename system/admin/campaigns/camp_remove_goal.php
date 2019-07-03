<?php
include '../../base_db.php';

$q = "DELETE FROM metas WHERE campanhas_id = {$_POST['camp_id']} AND nome = '{$_POST['name']}'";

$conn->query($q);

if ($conn->affected_rows == 1) echo "status:ok";
else echo "status:error";

?>
