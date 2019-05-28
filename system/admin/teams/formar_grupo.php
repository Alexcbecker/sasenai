<?php

$grupo = $_POST['grupo'];
$lider = $_POST['lider'];
$usuarios = $_POST['usuarios'];
$inseriu = 0;
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=administracao_grupos.php";


foreach($usuarios as $key => $value){

  $con = mysqli_connect("localhost","root","root","bd_fito");
  $formar_grupo = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES('{$value}', '{$grupo}')");
  $inseriu = mysqli_affected_rows($con);

  mysqli_close($con);


}

  $con = mysqli_connect("localhost","root","root","bd_fito");
  $formar_grupo1 = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES('{$lider}', '{$grupo}')");
  $inseriu = mysqli_affected_rows($con);

  mysqli_close($con);




if ($inseriu > 0) {
  $mensagem = "Grupo editado com sucesso!";
  $status = "success";
}else{

  $mensagem = "Erro ao editar grupo";

}
header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);

?>
