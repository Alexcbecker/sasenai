<?php

$nomeGrupo 			= $_POST['nomeGrupo'];
$descricaoGrupo = $_POST['descricaoGrupo'];


$con = mysqli_connect("localhost","root","root","bd_fito");
echo  "INSERT INTO grupos VALUES(DEFAULT, '{$nomeGrupo}', '{$descricaoGrupo}', 1 )";
$bd_fito = mysqli_query($con, "INSERT INTO grupos VALUES(DEFAULT, '{$nomeGrupo}', '{$descricaoGrupo}', 1 )");

$inseriu = mysqli_affected_rows($con);

mysqli_close($con);

if ($inseriu > 0) {
    header('Location: cadastro_grupo.php');
}else{

echo "er-r-r-r-ou";
}

?>
