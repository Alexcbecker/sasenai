<?php

include_once("../../database/conexao_bd.php");

$bgQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 0");
$bodyQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 1");
$feetQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 2");
$legsQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 3");
$torsoQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 4");
$hairQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 5");
$headGearQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 6");
$accessoriesQuery = mysqli_query($con, "SELECT * FROM itens WHERE slot = 7");

$arrayBgItems = array();
$arrayBodyItems = array();
$arrayFeetItems = array();
$arrayLegsItems = array();
$arrayTorsoItems = array();
$arrayHairItems = array();
$arrayHeadGearItems = array();
$arrayAccessoriesItems = array();

while($line = mysqli_fetch_array($bgQuery, MYSQLI_ASSOC)) {
    array_push($arrayBgItems, $line);
}

while($line = mysqli_fetch_array($bodyQuery, MYSQLI_ASSOC)) {
    array_push($arrayBodyItems, $line);
}

while($line = mysqli_fetch_array($feetQuery, MYSQLI_ASSOC)) {
    array_push($arrayFeetItems, $line);
}

while($line = mysqli_fetch_array($legsQuery, MYSQLI_ASSOC)) {
    array_push($arrayLegsItems, $line);
}

while($line = mysqli_fetch_array($torsoQuery, MYSQLI_ASSOC)) {
    array_push($arrayTorsoItems, $line);
}

while($line = mysqli_fetch_array($hairQuery, MYSQLI_ASSOC)) {
    array_push($arrayHairItems, $line);
}

while($line = mysqli_fetch_array($headGearQuery, MYSQLI_ASSOC)) {
    array_push($arrayHeadGearItems, $line);
}

while($line = mysqli_fetch_array($accessoriesQuery, MYSQLI_ASSOC)) {
    array_push($arrayAccessoriesItems, $line);
}

?>