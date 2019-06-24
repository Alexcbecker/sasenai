<?php

$id  = $_POST['id'];
$nomeGrupo       = $_POST['nomeGrupo'];
$decricaoGrupo     = $_POST['decricaoGrupo'];
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=teams&file=tela_editar_grupo.php";

if($nomeGrupo == ""){

  $mensagem = "Nome não preenchido!";
}else if($decricaoGrupo== ""){
  $mensagem = "Descrição não preenchida!";
}else{
 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");

       $inserirItem = mysql_insert("UPDATE `grupos` SET `nome`='$nomeGrupo',`descricao`='$decricaoGrupo' WHERE id='$id'");

        $status= "success";
         $mensagem="Grupo editado com sucesso!";



 }
 header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
