<?php

$id  = $_POST['id'];
$nomeMeta       = $_POST['nomeMeta'];
$decricaoMeta     = $_POST['decricaoMeta'];
$pontosMeta = $_POST['pontosMeta'];
$objetivoMeta = $_POST['objetivoMeta'];
$statusMeta = $_POST['statusMeta'];

$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=goals&file=tela_editar_meta.php";



if($nomeMeta == ""){

  $mensagem = "Nome não preenchido!";
}else if($decricaoMeta== ""){
  $mensagem = "Descrição não preenchida!";
}else{
 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");

       $inserirItem = mysql_insert("UPDATE `metas` SET `nome`='$nomeMeta',`descricao`='$decricaoMeta',`pontos`='$pontosMeta',`status`='$statusMeta',`objetivo`='$objetivoMeta' WHERE id='$id'");

        $status= "success";
         $mensagem="Meta editada com sucesso!";



 }
 header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
