<?php
  $id     = $_GET['id'];
  $msg    = "";
  $status = "danger";

  include "../../../database/conexao_bd.php";
  $sql_del  = "DELETE FROM campanhas WHERE id= {$id} " ;
  $result = mysqli_query($con, $sql_del);
  if ($result) {
    $msg  = "Campanha excluida com sucesso";
    $status ="success";
  }  else{
    $msg = "Erro ao excluir";
  }
  header("Location: ../navbar.php?folder=campaigns&file=tela_editar_campanha.php&status=".$status."&mensagem=".$msg."");
?>
