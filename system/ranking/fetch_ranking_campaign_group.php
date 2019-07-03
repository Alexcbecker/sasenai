<?php
include '../base_db.php';

$q = <<<S
SELECT grupos.nome AS nome, c.pontos AS pontos FROM grupos
INNER JOIN (SELECT grupos_id AS id, SUM(s.pontos) AS pontos 
FROM (SELECT colaboradores_has_grupos_id AS id, SUM(pontos_conquistados) AS pontos FROM metas_has_colaboradores_has_grupos
LEFT JOIN (SELECT id FROM metas WHERE metas.campanhas_id = '{$_GET['id']}') AS m ON m.id = metas_has_colaboradores_has_grupos.metas_id
GROUP BY metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id) AS s
INNER JOIN colaboradores_has_grupos ON s.id = colaboradores_has_grupos.id
GROUP BY colaboradores_has_grupos.grupos_id) AS c ON c.id = grupos.id
WHERE grupos.status = 0
ORDER BY c.pontos DESC
S;

$r = $conn->query($q);

$data = [];

while ($row = $r->fetch_assoc())
{
    $rowa = [];
 
    $rowa['name'] = $row['nome'];
    $rowa['points'] = $row['pontos'];
 
    array_push($data, $rowa);
}

echo json_encode($data);
?>