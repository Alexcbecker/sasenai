<?php
$msg ="Erro ao efetuar o logout.";
$status = "danger";
  session_start();
  unset($_SESSION);
  if(session_destroy()){
    $msg = "Logout efetuado com sucesso!!";
    $status = "success";
  }
  header("Location: ../../index.php?mensagem=".$msg."&status=".$status);
?>
