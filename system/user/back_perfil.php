<?php
session_start();

$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$tipo = $_SESSION['tipo'];
$sexo = $_SESSION['sexo'];
$pontos = $_SESSION['pontos'];
$creditos = $_SESSION['creditos'];


if ($tipo == 1) {
  $tipo = "Administrador";

} elseif ($tipo == 2) {
  $tipo = "Lider";

}else {
  $tipo = "Colaborador";
}

if ($sexo == 1) {
  $sexo = "Masculino";
}else {
  $sexo = "Feminino";
}


  echo $nome;
  echo "<br>";
  echo $senha;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $cpf;
  echo "<br>";
  echo $tipo;
  echo "<br>";
  echo $sexo;
  echo "<br>";
  echo $pontos;
  echo "<br>";
  echo $creditos;


 ?>
