<?php
include '../../base_db.php';

$path = "../../../images/real_items/";
$r_path = "images/real_items/";
$file_name = $_FILES['filename']['name'];

if (move_uploaded_file($_FILES['filename']['tmp_name'], "{$path}{$file_name}"))
{
    $q = "INSERT INTO itens (nome, valor, tipo, status, caminho, quantidade) VALUES ('{$_POST['name']}', {$_POST['value']}, 2, 0, '{$r_path}{$file_name}', {$_POST['quantity']})";

    $conn->query($q);

    echo "status:ok";
}
else echo "status:error";
?>