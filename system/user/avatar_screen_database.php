<?php

session_start();

include_once("../../database/conexao_bd.php");

$itens = mysqli_query($con, "SELECT * FROM itens");

?>