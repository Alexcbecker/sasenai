<?php
$nome_grupo = $_POST['nome_grupo'];
$descricao_grupo = $_POST['descricao_grupo'];
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=tela_cadastro_grupo.php";



$con = mysqli_connect("localhost","root","root","bd_fito");
$formar_grupo1 = mysqli_query($con, "INSERT INTO grupos (id, nome, status, descricao,`pontos`) VALUES(NULL, '{$nome_grupo}', 0, '{$descricao_grupo},0')");

$inseriu = mysqli_affected_rows($con);

mysqli_close($con);

if ($inseriu > 0) {
 $mensagem = "Grupo cadastrado com sucesso!";
 $status = "success";
}else{

    $mensagem = "Já existe um grupo cadastrado com este nome.";

}

header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);

?>
