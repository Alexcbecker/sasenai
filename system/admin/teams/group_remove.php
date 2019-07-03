<?php
include '../../base_db.php';

$q = "DELETE FROM grupos WHERE id = {$_POST['id']}";

$conn->query($q);

echo $conn->error;

echo "status:ok";

?>
