<?php
  $id     = $_GET['id'];
  $msg    = "";
  $status = "danger";

  include "../../../database/conexao_bd.php";
  $sql_del_meta  = "UPDATE `metas` SET `status`=1 WHERE `id`=$id" ;
  $result = mysqli_query($con, $sql_del_meta);
  $result = mysqli_query($con, "UPDATE `metas_has_colaboradores` SET `status`=1 WHERE `metas_id`=$id" );
  $result = mysqli_query($con, "UPDATE `metas_has_colaboradores_has_grupos` SET `status`=1 WHERE `metas_id`=$id" );
  if ($result) {
    $msg  = "Meta concluída com sucesso";
    $status ="success";
  }  else{
    $msg = "Erro ao concluir";
  }
  header("Location: ../navbar.php?folder=goals&file=tela_editar_meta.php&status=".$status."&mensagem=".$msg."");
?>
