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
SELECT id, nome, tipo, cpf FROM colaboradores
WHERE id NOT IN (SELECT colaboradores_id FROM colaboradores_has_grupos WHERE status = 0) AND tipo != 1
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
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['type'] = $row['tipo'] == 1 ? "Administrador" : ($row['tipo'] == 2 ? "Líder" : "Colaborador");
        
        array_push($data, $rowa);
    }
}

echo json_encode($data);

?>
