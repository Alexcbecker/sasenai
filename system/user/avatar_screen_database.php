<?php

session_start();

$userId = $_SESSION['id'];

include_once("../../database/conexao_bd.php");

$itens = mysqli_query($con, "SELECT * FROM itens");

$equipedItens = mysqli_query($con, "SELECT itens.caminho, itens.slot FROM avatares INNER JOIN avatares_has_itens ON avatares.id=avatares_has_itens.avatares_id INNER JOIN itens ON itens.id=avatares_has_itens.itens_id WHERE avatares.colaboradores_id='$userId' AND avatares_has_itens.status='1'");

?>