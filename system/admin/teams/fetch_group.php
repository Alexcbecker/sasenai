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

$q =  "SELECT id, nome, descricao, status FROM grupos WHERE nome = '{$_GET['name']}'";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    if ($row = $result->fetch_assoc())
    {
        $data['id'] = $row['id'];
        $data['name'] = $row['nome'];
        $data['desc'] = $row['descricao'];
        $data['status'] = $row['status'] == 0 ? 'Ativo' : 'Desativado';
    }
}

echo json_encode($data);

?>
