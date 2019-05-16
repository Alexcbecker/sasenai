<?php
  $id     = $_GET['id'];
  $msg    = "";
  $status = "danger";

  include "../../../database/conexao_bd.php";
  $sql_del  = "DELETE FROM itens WHERE id= $id";
  $result = mysqli_query($con, $sql_del);
  if ($result) {
    $msg  = "Item excluido com sucesso";
    $status ="success";
  }  else{
    $msg = "Erro ao excluir";
  }
  header("Location: ../navbar.php?folder=items&file=tela_editar_item.php&status=".$status."&mensagem=".$msg."");
?>
