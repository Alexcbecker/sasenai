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

$q = "SELECT nome, valor, quantidade, caminho, id FROM itens WHERE tipo=2";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while ($row = $result->fetch_assoc())
    {
        $rowa['id'] = $row['id'];
        $rowa['name'] = $row['nome'];
        $rowa['value'] = $row['valor'];
        $rowa['amount'] = $row['quantidade'];
        $rowa['image_path'] = $row['caminho'];

        array_push($data, $rowa);
    }
}

echo json_encode($data);
?>
