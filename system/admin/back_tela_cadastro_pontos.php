<?php
session_start();
include "../../database/conexao_bd.php";

$idCampanha = $_POST['idCampanha'];
$tipoCampanha = $_POST['tipoCampanha'];
$idColaborador = $_POST['idColaborador'];
$cpf = $_POST['cpf'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
var_dump($idCampanha);
var_dump($tipoCampanha);
var_dump($idColaborador);
var_dump($cpf);
$link     = "navbar.php?folder=&file=tela_cadastro_pontos.php";
$mensagem = "";

$queryMetas = mysqli_query($con, "SELECT * FROM `metas` WHERE metas.campanhas_id = '$idCampanha'");
$metas = mysqli_fetch_all($queryMetas, MYSQLI_ASSOC);

if ($tipoCampanha == 0) {
	$queryMetasIndividuais = mysqli_query($con, "SELECT * FROM metas INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.metas_id = metas.id WHERE metas_has_colaboradores.colaboradores_id = '$idColaborador'");
	// $campanhasIndividuais = mysqli_fetch_all($queryMetasIndividuais, MYSQLI_ASSOC);
	foreach ($queryMetasIndividuais as $metasIndividuais) {
		if($metasIndividuais['tipo'] == 1) {
			//valor
			$idMeta = $metasIndividuais['id'];
			$objetivoMeta = $metasIndividuais['objetivo'];
			$variantePontos = $metasIndividuais['variante_pontos'];
			$bonificacao = $metasIndividuais['bonificacao'];
			$valoresParaMultiplicarValor = round($valor/$variantePontos);
			$pontosDeValor = $bonificacao * $valoresParaMultiplicarValor;
			$atualizaPontosValor = mysqli_query($con,"UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $valor, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeValor, c.pontos = c.pontos + $pontosDeValor, c.creditos = c.creditos + $pontosDeValor WHERE mc.metas_id = $idMeta AND mc.colaboradores_id = $idColaborador");
			$atualizaStatusMetaValor = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
		} else if($metasIndividuais['tipo'] == 2) {
			//quantidade
			$idMeta = $metasIndividuais['id'];
			$objetivoMeta = $metasIndividuais['objetivo'];
			$variantePontos = $metasIndividuais['variante_pontos'];
			$bonificacao = $metasIndividuais['bonificacao'];
			$valoresParaMultiplicarQuantidade = round($quantidade/$variantePontos);
			$pontosDeQuantidade = $bonificacao * $valoresParaMultiplicarQuantidade;
			$atualizaPontosQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $quantidade, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeQuantidade, c.pontos = c.pontos + $pontosDeQuantidade, c.creditos = c.creditos + $pontosDeQuantidade WHERE mc.metas_id = $idMeta AND mc.colaboradores_id = $idColaborador");
			// UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + 1, mc.pontos_conquistados = mc.pontos_conquistados + 1, c.pontos = c.pontos + 1, c.creditos = c.creditos + 1 WHERE mc.metas_id = 3 AND mc.colaboradores_id = 3
			$atualizaStatusMetaQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
		}
	}
	$mensagem = "Campanha individual";
}

// header("Location: ".$link."&mensagem=".$mensagem);
?>