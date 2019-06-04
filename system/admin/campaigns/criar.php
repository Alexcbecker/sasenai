<?php
$nome_campanha      = $_POST['nome_campanha'];
$select_grupo       = isset($_POST['select_grupo']) ? $_POST['select_grupo'] : "";
$select_colaborador = isset($_POST['select_colaborador']) ? $_POST['select_colaborador'] : "";
$data_Inicio        = $_POST['dataInicio'];
$data_Fim           = $_POST['dataFim'];
$bonificacao        = $_POST['bonificacao'];
$variante_pontos    = $_POST['variante_pontos'];
$descricao          = $_POST['descricao'];
$tipo_pontos        = $_POST['tipo_pontuacao'];

$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=campaigns&file=cadastro_campanhas_front.php";

$tipo_cadastro = 0;

if($tipo_pontos == 'Valor'){
  $tipo_pontos = 1;
}else if($tipo_pontos == 'Quantidade'){
  $tipo_pontos = 2;
}

if($select_grupo == ''){

  $tipo_cadastro = 0;
}else{

  $tipo_cadastro = 1;
}


$con = mysqli_connect("localhost","root","root","bd_fito");
$bd_fito = mysqli_query($con, "INSERT INTO campanhas VALUES(NULL, '{$nome_campanha}', '{$descricao}','{$tipo_pontos}','{$bonificacao}','{$variante_pontos}','{$data_Inicio}','{$data_Fim}','$tipo_cadastro' )");
$inseriu = mysqli_affected_rows($con);


if ($inseriu > 0) {
  $mensagem = "Campanha criada com sucesso!";
  $status = "success";
}else{

  $mensagem = "Erro ao criar campanha";

}

header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);


if($select_colaborador == ''){

  $campanha = mysqli_insert_id($con);

  foreach($select_grupo as $key => $value){

    $con = mysqli_connect("localhost","root","root","bd_fito");
    $formar_campanha = mysqli_query($con, "INSERT INTO colaboradores_has_campanhas VALUES(NULL,NULL,'{$campanha}','0','{$value}')");
    $inseriu = mysqli_affected_rows($con);

    mysqli_close($con);
  }


  if ($inseriu > 0) {
$mensagem = "Campanha criada com sucesso!";
}else{

$mensagem = "Erro ao inserir grupo";

}
header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
}else{

  $campanha = mysqli_insert_id($con);

  $con = mysqli_connect("localhost","root","root","bd_fito");
  foreach($select_colaborador as $key => $value){


    $formar_campanha = mysqli_query($con, "INSERT INTO colaboradores_has_campanhas VALUES('{$value}', '{$campanha}','0',NULL)")or die(mysqli_error($con));

    $inseriu = mysqli_affected_rows($con);

  }

  if ($inseriu > 0) {
    $mensagem = "Campanha criada com sucesso!";
  }else{

    $mensagem = "Erro ao inserir colaboradores";

  }
  header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
mysqli_close($con);




}






?>
