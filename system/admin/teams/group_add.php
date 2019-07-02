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

$q =  "SELECT * FROM grupos WHERE nome = '{$_POST['name']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) echo "status:name";
else 
{
    $q =  "INSERT INTO grupos (nome, descricao) VALUES ('{$_POST['name']}', '{$_POST['desc']}')";

    $result = $conn->query($q);

    echo "status:ok";   
}

?>
