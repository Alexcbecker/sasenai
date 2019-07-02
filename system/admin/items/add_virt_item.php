<?php
include '../../base_db.php';

const $slots = ["Fundo" => 0, "Corpo" => 1, "Pés" => 2, "Pernas" => 3, "Torso" => 4, "Cabelo" => 5, "Acessórios de cabeça" => 6, "Acessórios gerais" => 7];

$path = "../../../images/items/";
$r_path = "images/items/";
$file_name = $_FILES['filename']['name'];

if (move_uploaded_file($_FILES['filename']['tmp_name'], "{$path}{$file_name}"))
{
    $q = "INSERT INTO itens (nome, valor, tipo, status, caminho, slot) VALUES ('{$_POST['name']}', {$_POST['value']}, 2, 0, '{$r_path}{$file_name}', {$slots[$_POST['slot']]}})";

    $conn->query($q);

    echo "status:ok";
}
else echo "status:error";   
?>