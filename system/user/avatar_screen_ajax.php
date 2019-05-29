<?php

session_start();

$con = mysqli_connect("localhost","root","root","bd_fito");

if(!$con){
    die("Erro no banco de dados");
}
$idUsuario = $_SESSION['id'];
$idItem = $_POST['id'];
$tipoItem = $_POST['tipo'];
$caminhoItem = $_POST['caminho'];
$sucesso = 0;

function updateAvatar() {

    $query = "UPDATE avatares_has_itens INNER JOIN colaboradores INNER JOIN itens ON itens.id=avatares_has_itens.itens_id SET avatares_has_itens.itens_id = '$idItem' WHERE avatares_has_itens.avatares_id = '1' AND colaboradores.id ='$idUsuario' AND itens.slot = '$tipoItem'";
    
    $resultUpdateQuery = mysqli_query($con, $query);

    $atualizou = mysqli_affected_rows($con);

    if($atualizou > 0) $sucesso = 1;
}
if($sucesso > 0) echo $caminhoItem;
else echo "erro";

?>