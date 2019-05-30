<?php

session_start();

$con = mysqli_connect("localhost","root","root","bd_fito");

if(!$con){
    die("Erro no banco de dados");
}

if($_POST["requestType"] == 1)
    updateAvatar($con);
else{
    $slotItem = $_POST['slot'];
    changeItemStatus($con, 0,$slotItem);
}


function updateAvatar($con){
    $idUsuario = $_SESSION['id'];
    $idItem = $_POST['id'];
    $tipoItem = $_POST['tipo'];
    $caminhoItem = $_POST['caminho'];
    $idAvatar = $_POST['idAvatar'];
    $sucesso = 0;

    $query = "UPDATE avatares_has_itens INNER JOIN colaboradores INNER JOIN itens ON itens.id=avatares_has_itens.itens_id SET avatares_has_itens.itens_id = $idItem, avatares_has_itens.status = 1 WHERE avatares_has_itens.avatares_id = $idAvatar AND colaboradores.id =$idUsuario AND itens.slot = '$tipoItem'";
        
    $resultUpdateQuery = mysqli_query($con, $query);

    $atualizou = mysqli_affected_rows($con);

    if($atualizou > 0) 
        echo $caminhoItem;
    else 
        echo "erro";
}

function changeItemStatus($con, $status, $slot) {
    $currentStatus = ($status == 0) ? 1: 0;

    $itemStatusQuery = "UPDATE avatares_has_itens INNER JOIN avatares ON avatares.id SET status='$status' WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.itens_id='$slot' AND avatares_has_itens.status='$currentStatus'";

    $resultStatusQuery = mysqli_query($con, $itemStatusQuery);

    $atualizou = mysqli_affected_rows($con);

    if($atualizou > 0) 
        $sucesso = 1;

    if($sucesso > 0) 
        echo 0;
    else 
        echo "erro";
}
?>