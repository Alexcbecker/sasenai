<?php
session_start();

if (($_SESSION['id_sessao']!=session_id()) || empty($_SESSION)) {
  unset($_SESSION);
  session_destroy();
  $msg = "Acesso Restrito!!!";
  $status = "warning";
  header("Location: ../../index.php?mensagem=".$msg."&status=".$status);
}
 ?>
