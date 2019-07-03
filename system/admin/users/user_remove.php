<?php
include '../../base_db.php';

$q = <<<S
SELECT id FROM colaboradores WHERE cpf <> {$_SESSION['cpf']} AND cpf = {$_POST['cpf']} 
AND id NOT IN (SELECT colaboradores_id FROM metas_has_colaboradores)
AND id NOT IN (SELECT colaboradores_id FROM colaboradores_has_grupos)
S;

$result = $conn->query($q);

if ($row = $result->fetch_assoc())
{
    $q = "SELECT id FROM avatares WHERE colaboradores_id = {$row['id']}";

    $result = $conn->query($q);
    
    while ($r = $result->fetch_assoc())
    {
        $q = "DELETE FROM avatares_has_itens WHERE avatares_id = {$r['id']}";
        $conn->query($q);
    }

    $q = "DELETE FROM avatares WHERE colaboradores_id = {$row['id']}";
    $conn->query($q);

    $q = "DELETE FROM colaboradores WHERE id = {$row['id']}";
    $conn->query($q);

    echo "status:ok";
}
else echo "status:error";
 

// $q = "DELETE FROM colaboradores WHERE cpf<>{$_SESSION['cpf']} AND cpf={$_POST['cpf']}";
// $result = $conn->query($q);

?>