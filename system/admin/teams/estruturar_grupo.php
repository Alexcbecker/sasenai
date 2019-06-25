<?php
$id  = $_POST['id'];
$lider = $_POST['liderGrupo'];
$usuarios = $_POST['usuarios'];
$inseriu = 0;
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=tela_editar_grupo.php";


$sql = "SELECT * FROM colaboradores_has_grupos WHERE colaboradores_has_grupos.colaboradores_id = '{$lider}'
AND colaboradores_has_grupos.grupos_id = '{$id}'";



$teste = array();

while($linha = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
  array_push($teste,$linha);
}


foreach($usuarios as $key => $value){

  $con = mysqli_connect("localhost","root","root","bd_fito");
  $formar_grupo = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES(NULL,'{$value}', '{$id}','0')");
  $inseriu = mysqli_affected_rows($con);




}

  $con = mysqli_connect("localhost","root","root","bd_fito");
  $formar_grupo1 = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES(NULL,'{$lider}', '{$id}','0')");
  $inseriu = mysqli_affected_rows($con);





if ($inseriu > 0) {
  $mensagem = "Grupo editado com sucesso!";
  $status = "success";
}else{

  $mensagem = "Erro ao editar grupo";

}
header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
mysqli_close($con);

?>
