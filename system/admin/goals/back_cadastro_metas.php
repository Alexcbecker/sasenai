<?php
$tipo_pontuacao = $_POST["tipo_pontuacao"];
$objetivo = $_POST["objetivo"];
$bonificacao = $_POST["bonificacao"];
$variante_pontos = $_POST["variante_pontos"];
$nome = $_POST["nome"];
$pontos = $_POST["pontos"];
$descricao = $_POST["descricao"];
$campanhas = $_POST['campanhas'];

$select_grupo       = isset($_POST['select_grupo']) ? $_POST['select_grupo'] : "";
$select_colaborador = isset($_POST['select_colaborador']) ? $_POST['select_colaborador'] : "";


$mensagem = "";
$status   = "danger";
$link     = "../navbar.php?folder=goals&file=cadastro_metas.php";


$con = mysqli_connect("localhost","root","root","bd_fito");
$campanha_tipo ="SELECT  `tipo_participantes` FROM `campanhas` WHERE `id`='$campanhas'";
$bd_fito = mysqli_query($con,$campanha_tipo);
$linha = mysqli_fetch_assoc($bd_fito);
if ($linha['tipo_participantes'] == 1) {
  if ($select_colaborador == '') {
    $con = mysqli_connect("localhost","root","root","bd_fito");
    $bd_fito = mysqli_query($con, "INSERT INTO `metas` (`id`, `nome`, `descricao`, `pontos`, `campanhas_id`, `objetivo`, `tipo`, `bonificacao`, `variante_pontos`, `status`) VALUES(NULL, '{$nome}', '{$descricao}', '{$pontos}','{$campanhas}','{$objetivo}', '{$tipo_pontuacao}','{$bonificacao}','{$variante_pontos}', 0)");
    $inseriu = mysqli_affected_rows($con);
    $id_metas = mysqli_insert_id($con);
    mysqli_close($con);

    foreach($select_grupo as $key => $value){

      $con = mysqli_connect("localhost","root","root","bd_fito");
      $formar_campanha = mysqli_query($con, "INSERT INTO `metas_has_colaboradores_has_grupos`(`metas_id`, `colaboradores_has_grupos_id`, `pontos_conquistados`, `objetivo_conquistado`, `status`) VALUES ('$id_metas','$value',0,0,0)");
      $inseriu = mysqli_affected_rows($con);
      mysqli_close($con);
    }
  }else{
    $mensagem = "A campanha selecionada é de grupo!";
    header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);


  }


} else {
  if ($select_grupo == '')  {
    $con = mysqli_connect("localhost","root","root","bd_fito");
    $bd_fito = mysqli_query($con, "INSERT INTO `metas` (`id`, `nome`, `descricao`, `pontos`, `campanhas_id`, `objetivo`, `tipo`, `bonificacao`, `variante_pontos`,`status`) VALUES(NULL, '{$nome}', '{$descricao}', '{$pontos}','{$campanhas}','{$objetivo}', '{$tipo_pontuacao}','{$bonificacao}','{$variante_pontos}',0)");
    $inseriu = mysqli_affected_rows($con);
    $id_metas = mysqli_insert_id($con);
    mysqli_close($con);

    foreach($select_colaborador as $key => $value){

      $con = mysqli_connect("localhost","root","root","bd_fito");
      $formar_campanha = mysqli_query($con, "INSERT INTO `metas_has_colaboradores`(`metas_id`, `colaboradores_id`, `pontos_conquistados`, `objetivo_conquistado`, `status`) VALUES ('$id_metas','$value',0,0,0)");
      $inseriu = mysqli_affected_rows($con);

      mysqli_close($con);
    }
  }else{
    $mensagem = "A campanha selecionada é individual!";

    header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);

  }

}





if ($inseriu > 0) {
  $mensagem = "Meta criada com sucesso!";
  $status = "success";
}else{

  $mensagem = "Erro ao cadastrar meta!";

}
header("Location: ".$link."&mensagem=".$mensagem."&status=".$status);
?>
