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


$q =  "SELECT * FROM grupos WHERE nome = '{$_POST['name']}' AND id != '{$_POST['id']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else
{
    $st = $_POST['status'] == 'Ativo' ? 0 : 1;
    $q =  "UPDATE grupos SET nome='{$_POST['name']}', descricao='{$_POST['desc']}', status='{$st}' WHERE id='{$_POST['id']}'";

    $conn->query($q);

    echo "status:ok";
}
?>
