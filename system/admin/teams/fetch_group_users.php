<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  != session_id()) die;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
mysqli_set_charset($conn, "utf8");

$q = <<<S
SELECT colaboradores.cpf AS cpf, colaboradores.nome AS nome, colaboradores.tipo AS tipo, s.status AS status FROM colaboradores
INNER JOIN (SELECT colaboradores_id AS id, status FROM colaboradores_has_grupos WHERE colaboradores_has_grupos.grupos_id = '{$_GET['id']}') AS s ON s.id = colaboradores.id
ORDER BY colaboradores.tipo
S;

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while ($row = $result->fetch_assoc())
    {
        $rowa['cpf'] = $row['cpf'];
        $rowa['name'] = $row['nome'];
        $rowa['type'] = $row['tipo'] == 1 ? "Administrador" : ($row['tipo'] == 2 ? "Líder" : "Colaborador");
        $rowa['status'] = $row['status'] == 0 ? 'Ativo' : 'Desativado';

        array_push($data, $rowa);
    }
}

echo json_encode($data);

?>
