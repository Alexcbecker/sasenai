<?php
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
         echo "The file ". basename( $_FILES["imagemItemDigital"]["name"]). " has been uploaded.";
         $nomeItemDigital = $_POST["nomeItemDigital"];
         $valorItemDigital = $_POST["valorItemDigital"];
         $inserirItem = mysql_insert("INSERT INTO `itens`(`id`, `nome`, `valor`, `tipo`, `status`, `caminho`) VALUES (NULL,'$nomeItemDigital',$valorItemDigital,2,0,'$target_file')");
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
 }
 ?>
