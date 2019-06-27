<?php
  $id     = $_GET['id'];
  $msg    = "";
  $status = "danger";

  include "../../../database/conexao_bd.php";
  $sql_del  = "UPDATE grupos set status = 1 where id= {$id}";
  $result = mysqli_query($con, $sql_del);
  if ($result) {
    $msg  = "Grupo excluido com sucesso";
    $status ="success";
  }  else{
    $msg = "Erro ao excluir";
  }
  header("Location: ../navbar.php?folder=teams&file=tela_editar_grupo.php&status=".$status."&mensagem=".$msg."");
?>
