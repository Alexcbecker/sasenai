<?php

session_start();

$userId = $_SESSION['id'];
$avatarId = "";

$idItem = $_POST['id'];
$tipoItem = $_POST['tipo'];

echo $tipoItem;
// include_once("../../database/conexao_bd.php");

// $itens = mysqli_query($con, "SELECT * FROM itens");

// $resultEquipedItens = mysqli_query($con, "SELECT avatares.id as 'avatarid', itens.caminho, itens.slot FROM avatares INNER JOIN avatares_has_itens ON avatares.id=avatares_has_itens.avatares_id INNER JOIN itens ON itens.id=avatares_has_itens.itens_id WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.status='1'");

// $equipedItens = mysqli_fetch_all($resultEquipedItens, MYSQLI_ASSOC);
// print_r($equipedItens);
// $avatarId = $equipedItens[0]['id'];

// function saveAvatar($bgPath, $feetPath, $legsPath, $torsoPath, $hairPath, $headGearPath, $accessoriesPath) {

//     $query = "";
    
//     $resultSaveQuery = mysqli_query($con, $query);
// }

// function changeItemStatus($status, $slot) {
//     echo $status;
//     $currentStatus = ($status == 0) ? 1: 0;
//     // $itemStatusQuery = "UPDATE avatares_has_itens INNER JOIN avatares ON avatares.id SET status='$status' WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.itens_id='$slot' AND avatares_has_itens.status='$currentStatus'";
//     $itemStatusQuery = "UPDATE avatares_has_itens INNER JOIN avatares ON avatares.id SET status='0' WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.itens_id='8' AND avatares_has_itens.status='1'";

//     $resultStatusQuery = mysqli_query($con, $itemStatusQuery);
// }

?>