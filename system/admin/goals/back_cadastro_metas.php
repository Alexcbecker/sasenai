<?php
$nome = $_POST["nome"];
$pontos = $_POST["pontos"];
$descricao = $_POST["descricao"];
$campanhas = $_POST['campanhas'];

$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=goals&file=cadastro_metas.php";

$con = mysqli_connect("localhost","root","root","bd_fito");
$bd_fito = mysqli_query($con, "INSERT INTO metas VALUES(NULL, '{$nome}', '{$descricao}', '{$pontos}','{$campanhas}')");
$inseriu = mysqli_affected_rows($con);

mysqli_close($con);

if ($inseriu > 0) {
    $mensagem = "Meta criada com sucesso!";
    $status = "success";
  }else{
  
    $mensagem = "Erro ao cadastrar meta";
  
  }
  header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
?>
