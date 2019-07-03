<?php
include '../../base_db.php';

$q = "DELETE FROM campanhas WHERE id = {$_POST['id']}";

$conn->query($q);

if ($conn->affected_rows == 1) echo "status:ok";
else echo "status:error";

?>
