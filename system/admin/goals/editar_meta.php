<?php

$id  = $_POST['id'];
$nomeMeta       = $_POST['nomeMeta'];
$descricaoMeta     = $_POST['descricaoMeta'];
$pontosMeta = $_POST['pontosMeta'];
$objetivoMeta = $_POST['objetivoMeta'];
// $statusMeta = $_POST['statusMeta'];
$campanhas_idMeta = $_POST['campanhasid'];
$tipoMeta = $_POST['tipoMeta'];
$bonificacaoMeta = $_POST['bonificacaoMeta'];
$variante_pontosMeta = $_POST['variante_pontosMeta'];
// echo $id , "---------";
// echo $nomeMeta, "---------";
// echo $descricaoMeta ,"---------";
// echo $pontosMeta, "---------";
// echo $objetivoMeta, "---------";
// echo $campanhas_idMeta, "---------";
// echo $tipoMeta, "---------";
// echo $bonificacaoMeta, "---------";
// echo $variante_pontosMeta, "---------";

$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=goals&file=tela_editar_meta.php";



 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");

       $inserirMeta = mysql_insert("UPDATE `metas` SET `nome`='$nomeMeta',`descricao`='$descricaoMeta',`pontos`='$pontosMeta',`campanhas_id`='$campanhas_idMeta',`objetivo`='$objetivoMeta',`tipo`='$tipoMeta',`bonificacao`='$bonificacaoMeta',`variante_pontos`='$variante_pontosMeta' WHERE id='$id'");
    


        $status= "success";
         $mensagem="Meta editada com sucesso!";


header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
