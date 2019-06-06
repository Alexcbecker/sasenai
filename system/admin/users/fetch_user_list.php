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

    $q = "SELECT * FROM colaboradores";

    $result = $conn->query($q);

    $data = [];

    if ($result->num_rows > 0)
    {
        $rowa = [];

        while ($row = $result->fetch_assoc())
        {
            $rowa['name'] = utf8_encode($row['nome']);
            $rowa['cpf'] = $row['cpf'];
            $rowa['email'] = $row['email'];
            $rowa['type'] = $row['tipo'] == 1 ? "Administrador" : ($row['tipo'] == 2 ? "Líder" : "Colaborador");
            $rowa['sex'] = $row['sexo'] == 1 ? "Masculino" : "Feminino";
            $rowa['status'] = $row['status'] == 0 ? "Ativo" : "Desativado";
            $rowa['adm'] = $row['cpf'] == $_SESSION['cpf'] ? "True" : "False";

            array_push($data, $rowa);
        }
    }

    echo json_encode($data);
}
else die;

?>
