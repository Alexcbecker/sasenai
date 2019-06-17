<?php
session_start();
$id = $_SESSION['id'];
$senha      = $_POST['senha'];
$nova_senha       = $_POST['nova_senha'];
$mensagem = "";
$status   = "danger";
$link     = "navbar_usuario.php?folder=user&file=back_perfil.php";

$con = mysqli_connect("localhost","root","root","bd_fito");

     include("../../database/conexao_bd.php");
     include("../../database/funcoes_base_crud.php");
     $alter = mysqli_query($con, "UPDATE colaboradores SET senha='{$nova_senha}' WHERE id='{$id}' && senha='{$senha}'");
    if (mysqli_affected_rows($con) > 0)
    {
      $_SESSION['senha'] = $nova_senha;
      $status= "success";
      $mensagem="Senha editada com sucesso!";
    }
    else {
      $status= "error";
      $mensagem="Senhan nao editada";
    }



  header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
?>
