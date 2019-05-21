<?php

$id  = $_POST['id'];
$nomeItemDigital       = $_POST['nomeItemDigital'];
$valorItemDigital      = $_POST['valorItemDigital'];
$quantidadeItemDigital = $_POST['quantidadeItemDigital'];
$imagemItemDigital = $_POST['imagem'];
$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=items&file=tela_editar_item.php";

if($nomeItemDigital == ""){

  $mensagem = "Nome não preenchido!";
}else if($valorItemDigital == ""){
  $mensagem = "Valor não preenchida!";
}else{
 include("../../../database/conexao_bd.php");
 include("../../../database/funcoes_base_crud.php");

 $target_dir = "../../../images/real_items/";
 $target_file = $target_dir . basename($_FILES["imagemItemDigital"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["imagemItemDigital"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
 }
 if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
 } else {
     if (move_uploaded_file($_FILES["imagemItemDigital"]["tmp_name"], $target_file)) {
$target_file = substr($target_file, 3, 1111);
       $inserirItem = mysql_insert("UPDATE `itens` SET `nome`='$nomeItemDigital',`valor`='$valorItemDigital',`caminho`='$target_file',`quantidade`='$quantidadeItemDigital' WHERE id='$id'");

        $status= "success";
         $mensagem="Item editado com sucesso!";

     } else {
       $inserirItem = mysql_insert("UPDATE `itens` SET `nome`='$nomeItemDigital',`valor`='$valorItemDigital',`caminho`='$imagemItemDigital',`quantidade`='$quantidadeItemDigital' WHERE id='$id'");

        $status= "success";
         $mensagem="Item editado com sucesso!";

     }
 }
 }
 header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
 ?>
