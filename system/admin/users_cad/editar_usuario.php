<?php

$id  = $_POST['id'];
$nomeUsuario        = $_POST['nomeUsuario'];
$emailUsuasio       = $_POST['emailUsuasio'];
$cpfUsuario         = $_POST['cpfUsuario'];
$tipoUsuario        = $_POST['tipoUsuario'];
$sexoUsuario        = $_POST['sexoUsuario'];
$statusUsuario      = $_POST['statusUsuario'];
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=users_cad&file=tela_editar_usuario.php";

if($nomeUsuario  == ""){

  $mensagem = "Nome não preenchido!";
}else if($emailUsuasio == ""){
  $mensagem = "email não preenchido!";
}else if($cpfUsuario == ""){
  $mensagem = "cpf não preenchido!";
}else if($tipoUsuario == ""){
  $mensagem = "tipo não preenchido!";
}else if($sexoUsuario == ""){
  $mensagem = "sexo não preenchido!";
}else if($statusUsuario == ""){
  $mensagem = "status não preenchido!";
}else{
 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");


       $inserirUsuario = mysql_insert("UPDATE `colaboradores` SET `email`='$emailUsuasio',`cpf`='$cpfUsuario',`nome`='$nomeUsuario',`tipo`='$tipoUsuario',`sexo`='$sexoUsuario',`status`='$statusUsuario' WHERE id='$id'");

        $status= "success";
         $mensagem="Usuário editado com sucesso!";


 }

 header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
