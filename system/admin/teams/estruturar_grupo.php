<?php
$id  = $_POST['id'];
$lider = $_POST['liderGrupo'];
$usuarios = $_POST['usuarios'];
$inseriu = 0;
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=tela_editar_grupo.php";




    $con = mysqli_connect("localhost","root","root","bd_fito");

foreach($usuarios as $key => $value){

  $sql = "SELECT * FROM colaboradores_has_grupos WHERE colaboradores_id = '{$value}'
  AND grupos_id = '{$id}'";
  $result = mysqli_query($con, $sql);
  $confere = mysqli_affected_rows($con);

  if($confere > 0){
  }else{
    $formar_grupo = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES(NULL,'{$value}', '{$id}','0')");
    $inseriu = mysqli_affected_rows($con);

       }
}










$sql = "SELECT * FROM colaboradores_has_grupos WHERE colaboradores_id = '{$lider}'
AND grupos_id = '{$id}'";
$result = mysqli_query($con, $sql);
$confere = mysqli_affected_rows($con);


  if($confere > 0){
  }else{

      $sql1 = "SELECT colaboradores.tipo AS 'colaboradortipo', grupos.id AS 'grupoid'
      FROM grupos
      INNER JOIN colaboradores_has_grupos
      ON colaboradores_has_grupos.grupos_id = $id
      INNER JOIN colaboradores
      ON colaboradores_has_grupos.colaboradores_id=colaboradores.id
      WHERE colaboradores.tipo = 2";

      $resultado = mysqli_query($con, $sql1);
      $revisa = mysqli_affected_rows($con);


          if($revisa >= 1){
          }else{
            $con = mysqli_connect("localhost","root","root","bd_fito");
            $formar_grupo1 = mysqli_query($con, "INSERT INTO colaboradores_has_grupos VALUES(NULL,'{$lider}', '{$id}','0')");
            $inseriu = mysqli_affected_rows($con);
          }
}












if ($inseriu > 0) {
  $mensagem = "Grupo editado com sucesso!";
  $status = "success";
}else{

  $mensagem = "Por favor, verifique se o usuário já está cadastrado.";

}
header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
mysqli_close($con);

?>
