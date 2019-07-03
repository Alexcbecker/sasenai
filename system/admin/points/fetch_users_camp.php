<?php
include '../../base_db.php';

$q = <<<S
SELECT * FROM colaboradores
INNER JOIN metas_has_colaboradores ON colaboradores.id = metas_has_colaboradores.colaboradores_id
WHERE metas_has_colaboradores.metas_id = {$_GET['id']} and metas_has_colaboradores.status = 0
ORDER BY colaboradores.nome
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
        $rowa['cpf'] = $row['cpf'];
        $rowa['type'] = $row['tipo'] == 1 ? "Administrador" : ($row['tipo'] == 2 ? "Líder" : "Colaborador");

        array_push($data, $rowa);
    }
}


echo json_encode($data);
?>