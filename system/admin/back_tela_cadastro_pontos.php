<?php
session_start();
include "../../database/conexao_bd.php";

$idCampanha = $_POST['idCampanha'];
$tipoCampanha = $_POST['tipoCampanha'];
$idColaborador = $_POST['idColaborador'];
$cpf = $_POST['cpf'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$link     = "navbar.php?folder=&file=tela_cadastro_pontos.php";
$mensagem = "";

$queryMetas = mysqli_query($con, SELECT * FROM `metas` WHERE metas.campanhas_id = '$idCampanha');
$metas = mysqli_fetch_all($queryMetas, MYSQLI_ASSOC);

if ($tipoCampanha == 0) {
	$queryMetasIndividuais = mysqli_query($con, SELECT * FROM metas INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.metas_id = metas.id WHERE metas_has_colaboradores.colaboradores_id = '$idColaborador');
	// $campanhasIndividuais = mysqli_fetch_all($queryMetasIndividuais, MYSQLI_ASSOC);
	foreach ($queryMetasIndividuais as $metasIndividuais) {
		# code...
	}

	$pontos = ;
	$mensagem = "Campanha individual";
}

header("Location: ".$link."&mensagem=".$mensagem);
?>