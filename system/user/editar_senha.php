<?php
session_start();
$id = $_SESSION['id'];
$senha      = $_POST['senha'];
$nova_senha       = $_POST['nova_senha'];
$mensagem = "";
$status   = "danger";
$link     = "navbar_usuario.php?folder=&file=back_perfil.php";
$confirmar_nvsenha = $_POST['confirmar_nvsenha'];

$con = mysqli_connect("localhost","root","root","bd_fito");

     include("../../database/conexao_bd.php");
     include("../../database/funcoes_base_crud.php");


     if ($nova_senha == $confirmar_nvsenha) {
        $alter = mysqli_query($con, "UPDATE colaboradores SET senha='{$nova_senha}' WHERE id='{$id}' && senha='{$senha}'");
       if (mysqli_affected_rows($con) > 0)
       {
         $_SESSION['senha'] = $nova_senha;
         $status= "success";
         $mensagem="Senha editada com sucesso!";
       }
       else{
         $status= "danger";
         $mensagem="Senha não editada";
       }

     }else{

       $status= "danger";
       $mensagem="Senhas incompátiveis";

     }

  header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
?>
