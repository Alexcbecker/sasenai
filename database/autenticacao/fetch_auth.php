<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao'] != session_id()) die;

$data = [];
$data['name'] = $_SESSION['nome'];
$data['email'] = $_SESSION['email'];
$data['cpf'] = $_SESSION['cpf'];
$data['type'] = $_SESSION['tipo'] == 1 ? "Administrador" : ($_SESSION['tipo'] == 2 ? "Líder" : "Colaborador");
$data['sex'] = $_SESSION['sexo'] == 1 ? "Masculino" : "Feminino";

echo json_encode($data);

?>