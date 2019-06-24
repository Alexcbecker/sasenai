<?php

$id                      = $_POST['id'];
$nomeCampanha            = $_POST['nomeCampanha'];
$decricaoCampanha        = $_POST['decricaoCampanha'];
$tipo_participante       = $_POST['tipoCampanha'];
$data_inicialCampanha    = $_POST['data_inicialCampanha'];
$data_finalCampanha      = $_POST['data_finalCampanha'];


$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=campaigns&file=tela_editar_campanha.php";

if($nomeCampanha == ""){

  $mensagem = "Nome não preenchido!";
}else if($decricaoCampanha== ""){
  $mensagem = "Descrição não preenchida!";
}else if($tipoCampanha== ""){
  $mensagem = "Tipo de participante não preenchido!";
}else if($data_inicialCampanha== ""){
  $mensagem = "Data inicial não preenchida!";
}else if($data_finalCampanha== ""){
  $mensagem = "Data final não preenchida!";
}else{
 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");

       $inserirItem = mysql_insert("UPDATE `campanhas` SET `nome`='$nomeCampanha',`descricao`='$decricaoCampanha',`tipo`='$tipo_participante',`data_inicial`='$data_inicialCampanha',`data_final`='$data_finalCampanha' WHERE id='$id'");

        $status= "success";
         $mensagem="Campanha editada com sucesso!";



 }
 header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
