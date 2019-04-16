<?php
  include "conect_login.php"; 
  include "database.php";
  //recebendo variaveis
  $p_cpf = $_POST['cpf'];
  $p_senha = $_POST['senha'];

 // var_dump($_POST);
 
 $buscaUsuario = mysql_select("SELECT * FROM colaboradores WHERE cpf={$p_cpf} AND senha={$p_senha}");
  var_dump($buscaUsuario[0]['email']);
 if(!empty($buscaUsuario)){
     session_start();
     
     if($buscaUsuario[0]['tipo']==1){
         header('Location: ../nav-bares/navbar.php');
     }else if($buscaUsuario[0]['tipo']==2){
         header('Location: ../nav-bares/navbar_lider.php');
     }else if($buscaUsuario[0]['tipo']==3){
         header('Location: ../nav-bares/navbar_usuario.php');
     }else{
         die("Erro de tipo de usuário");
     }
     //echo "CPF encontrado.";
 }else{
     echo "CPF ou senha incorretos.";
 }
  
?>
