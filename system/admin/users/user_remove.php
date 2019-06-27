<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  == session_id())
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    mysqli_set_charset($conn, "utf8");

    $q = "DELETE FROM colaboradores WHERE cpf<>{$_SESSION['cpf']} AND cpf={$_POST['cpf']}";
    $result = $conn->query($q);
    $result = $conn->query($q);
}
else die;
?>
