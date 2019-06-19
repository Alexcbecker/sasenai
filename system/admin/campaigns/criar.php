<?php
$nome_campanha      = $_POST['nome_campanha'];
$data_Inicio        = $_POST['dataInicio'];
$data_Fim           = $_POST['dataFim'];
$descricao          = $_POST['descricao'];
$tipo_participante  = $_POST['tipo_participante'];

$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=campaigns&file=cadastro_campanhas_front.php";


if($tipo_participante == 'individual'){
  $tipo_participante = 0;
}else if($tipo_participante == 'grupo'){
  $tipo_participante = 1;
}


$con = mysqli_connect("localhost","root","root","bd_fito");
$bd_fito = mysqli_query($con, "INSERT INTO campanhas VALUES(NULL, '{$nome_campanha}', '{$descricao}','{$data_Inicio}','{$data_Fim}','$tipo_participante')");
$inseriu = mysqli_affected_rows($con);


if ($inseriu > 0) {
  $mensagem = "Campanha criada com sucesso!";
  $status = "success";
}else{

  $mensagem = "Erro ao criar campanha";

}

header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);

?>
