<?php
session_start();

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$tipo = $_SESSION['tipo'];
$sexo = $_SESSION['sexo'];
$pontos = $_SESSION['pontos'];
$creditos = $_SESSION['creditos'];


if ($tipo == 1) {
  $tipo = "Administrador";

  echo $nome;
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

} elseif ($tipo == 2) {
  $tipo = "Lider";

  echo $nome;
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

}else {
  $tipo = "Colaborador";

  echo $nome;
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

}



 ?>
