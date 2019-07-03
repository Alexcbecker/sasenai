<?php
include '../../base_db.php';

$q = <<<S
UPDATE colaboradores_has_grupos
SET colaboradores_has_grupos.status = 1
WHERE colaboradores_has_grupos.colaboradores_id IN (SELECT id FROM colaboradores WHERE cpf = {$_POST['value']})
S;

$conn->query($q);

echo "status:ok";

?>
