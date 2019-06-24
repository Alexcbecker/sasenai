<?php
$nome_grupo = $_POST['nome_grupo'];
$descricao_grupo = $_POST['descricao_grupo'];
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=tela_cadastro_grupo.php";



$con = mysqli_connect("localhost","root","root","bd_fito");
$formar_grupo1 = mysqli_query($con, "INSERT INTO grupos VALUES(NULL,'{$nome_grupo}','0', '{$descricao_grupo}')");
echo $formar_grupo1;
$inseriu = mysqli_affected_rows($con);

mysqli_close($con);

if ($inseriu > 0) {
 $mensagem = "Grupo cadastrado com sucesso!";
 $status = "success";
}else{

    $mensagem = "Erro ao cadastrar grupo";

}

header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);

?>
