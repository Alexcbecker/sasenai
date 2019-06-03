<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$q = "SELECT * FROM colaboradores";

$result = $conn->query($q);

$data = [];

if ($result->num_rows > 0)
{
    $rowa = [];

    while($row = $result->fetch_assoc())
    {
        $rowa['name'] = $row['nome'];
        $rowa['cpf'] = $row['cpf'];
        $rowa['email'] = $row['email'];
        $rowa['type'] = $row['tipo'] == 1 ? "Administrador" : $row['tipo'] == 2 ? "Líder" : "Colaborador";
        $rowa['sex'] = $row['sexo'] == 1 ? "Masculino" : "Feminino";
        $rowa['status'] = $row['status'] == 0 ? "Ativo" : "Desativado";

        array_push($data, $rowa);
    }
}

echo json_encode($data);
?>
