<?php
include '../../base_db.php';

$q = <<<S
SELECT * FROM grupos
NOT IN (SELECT DISTINCT grupos_id AS id FROM colaboradores_has_grupos
INNER JOIN (SELECT colaboradores_has_grupos_id AS id FROM metas_has_colaboradores_has_grupos) AS s ON s.id = colaboradores_has_grupos.id) AS c ON c.id = grupos.id
WHERE grupos.status = 0
ORDER BY grupos.nome
S;

$r = $conn->query($q);

$data = [];

if ($r->num_rows > 0)
{
    $rowa = [];

    while ($row = $r->fetch_assoc())
    {
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['desc'] = $row['descricao'];

        array_push($data, $rowa);
    }
}


echo json_encode($data);
?>