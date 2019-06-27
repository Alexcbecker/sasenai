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

    $q = "SELECT nome, valor, quantidade, caminho FROM itens WHERE nome='{$_GET['name']}' AND tipo=2";

    $result = $conn->query($q);

    $data = [];

    if ($row = $result->fetch_assoc())
    {
        $data['name'] = $row['nome'];
        $data['value'] = $row['valor'];
        $data['amount'] = $row['quantidade'];
        $data['image_path'] = $row['caminho'];
    }

    echo json_encode($data);
}

?>
