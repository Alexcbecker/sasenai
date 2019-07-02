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

if (isset($_FILES['filename']))
{
    $path = "../../../images/real_items/";
    $r_path = "images/real_items/";
    $file_name = $_FILES['filename']['name'];

    if (move_uploaded_file($_FILES['filename']['tmp_name'], "{$path}{$file_name}"))
    {
        $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, caminho = '{$r_path}{$file_name}', quantidade = {$_POST['quantity']} WHERE id = {$_POST['id']}";

        $conn->query($q);
    
        echo "status:ok";
    }
    else
    {
        $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, quantidade = {$_POST['quantity']} WHERE id = {$_POST['id']}";
    
        $conn->query($q);
    
        echo "status:ok";    
    }
}
else 
{
    $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, quantidade = {$_POST['quantity']} WHERE id = {$_POST['id']}";
    
    $conn->query($q);
    
    echo "status:ok";
}
?>