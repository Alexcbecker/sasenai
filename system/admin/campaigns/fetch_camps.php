<?php
include '../../base_db.php';

$q =  "SELECT * FROM campanhas ORDER BY nome";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while ($row = $result->fetch_assoc())
    {
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['desc'] = $row['descricao'];
        $rowa['date_start'] = $row['data_inicial'];
        $rowa['date_end'] = $row['data_final'];
        $rowa['type'] = $row['tipo_participantes'] == 0 ? "Invividual" : "Grupo"; 

        array_push($data, $rowa);
    }
}

echo json_encode($data);

?>
