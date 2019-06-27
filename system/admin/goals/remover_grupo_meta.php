<?php
  $id     = $_GET['id'];
  $idmetas     = $_GET['meta'];
  $msg    = "";
  $status = "danger";

  include "../../../database/conexao_bd.php";
  $result = mysqli_query($con,  "DELETE FROM `metas_has_colaboradores_has_grupos` WHERE `colaboradores_has_grupos_id`={$id} AND `metas_id`={$idmetas}  ");
  if ($result) {
    $msg  = "Grupo removido com sucesso";
    $status ="success";
  }  else{
    $msg = "Erro ao remover grupo";
  }
 header("Location: ../navbar.php?folder=goals&file=tela_editar_meta.php&status=".$status."&mensagem=".$msg."");
?>
