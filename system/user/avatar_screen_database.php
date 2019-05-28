<?php

session_start();

define("UNEQUIP", 0);
define("EQUIP", 1);

$userId = $_SESSION['id'];

include_once("../../database/conexao_bd.php");

$itens = mysqli_query($con, "SELECT * FROM itens");

$resultEquipedItens = mysqli_query($con, "SELECT avatares.id as 'avatarid', avatares_has_itens.itens_id as 'itensId',itens.caminho, itens.slot FROM avatares INNER JOIN avatares_has_itens ON avatares.id=avatares_has_itens.avatares_id INNER JOIN itens ON itens.id=avatares_has_itens.itens_id WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.status='1'");

$equipedItens = mysqli_fetch_all($resultEquipedItens, MYSQLI_ASSOC);
$avatarId = $equipedItens[0]['id'];

function updateAvatar($newitemId, $slot) {

    $query = "UPDATE avatares_has_itens INNER JOIN colaboradores INNER JOIN itens ON itens.id=avatares_has_itens.itens_id SET avatares_has_itens.itens_id = '$newitemId' WHERE avatares_has_itens.avatares_id = '$avatarId' AND colaboradores.id ='$userId' AND itens.slot = '$slot'";
    
    $resultSaveQuery = mysqli_query($con, $query);
}

function changeItemStatus($status, $slot) {
    $currentStatus = ($status == 0) ? 1: 0;

    $itemStatusQuery = "UPDATE avatares_has_itens INNER JOIN avatares ON avatares.id SET status='$status' WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.itens_id='$slot' AND avatares_has_itens.status='$currentStatus'";

    $resultStatusQuery = mysqli_query($con, $itemStatusQuery);
}
?>