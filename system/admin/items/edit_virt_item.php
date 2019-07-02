<?php
include '../../base_db.php';

const $slots = ["Fundo" => 0, "Corpo" => 1, "Pés" => 2, "Pernas" => 3, "Torso" => 4, "Cabelo" => 5, "Acessórios de cabeça" => 6, "Acessórios gerais" => 7];

if (isset($_FILES['filename']))
{
    $path = "../../../images/items/";
    $r_path = "images/items/";
    $file_name = $_FILES['filename']['name'];

    if (move_uploaded_file($_FILES['filename']['tmp_name'], "{$path}{$file_name}"))
    {
        $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, caminho = '{$r_path}{$file_name}', slot = {$slots[$_POST['slot']]} WHERE id = {$_POST['id']}";

        $conn->query($q);
    
        echo "status:ok";
    }
    else
    {
        $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, {$slots[$_POST['slot']]} WHERE id = {$_POST['id']}";
    
        $conn->query($q);
    
        echo "status:ok";    
    }
}
else 
{
    $q = "UPDATE itens SET nome = '{$_POST['name']}', valor = {$_POST['value']}, {$slots[$_POST['slot']]} WHERE id = {$_POST['id']}";
    
    $conn->query($q);
    
    echo "status:ok";
}
?>