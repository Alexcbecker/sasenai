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

    $cpf = $_GET['value'];
    $q = "SELECT * FROM colaboradores WHERE cpf={$cpf}";

    $result = $conn->query($q);

    $data = [];

    if ($result->num_rows == 1)
    {
        if ($row = $result->fetch_assoc())
        {
            $data['name'] = $row['nome'];
            $data['cpf'] = $row['cpf'];
            $data['email'] = $row['email'];
            $data['type'] = $row['tipo'] == 1 ? "Administrador" : ($row['tipo'] == 2 ? "Líder" : "Colaborador");
            $data['sex'] = $row['sexo'] == 1 ? "Masculino" : "Feminino";
            $data['status'] = $row['status'] == 0 ? "Ativo" : "Desativado";
            $data['adm'] = $cpf == $_SESSION['cpf'] ? "True" : "False";
        }
    }

    echo json_encode($data);
}

?>
