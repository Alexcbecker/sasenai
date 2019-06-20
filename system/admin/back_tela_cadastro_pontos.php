<?php
session_start();
include "../../database/conexao_bd.php";

$idColaborador = $_POST['idColaborador'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$link     = "navbar.php?folder=&file=tela_cadastro_pontos.php";
$mensagem = "";

// $queryMetas = mysqli_query($con, "SELECT * FROM `metas` LEFT OUTER JOIN (select distinct id, campanhas.tipo_participantes from campanhas) c ON c.id=metas.campanhas_id");
// $metas = mysqli_fetch_all($queryMetas, MYSQLI_ASSOC);

$queryMetasIndividuais = mysqli_query($con, "SELECT * FROM metas INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.metas_id = metas.id LEFT OUTER JOIN (select distinct id, campanhas.tipo_participantes from campanhas)c ON c.id=metas.campanhas_id WHERE metas_has_colaboradores.colaboradores_id = $idColaborador AND c.tipo_participantes = 0");
foreach ($queryMetasIndividuais as $metasIndividuais) {
	// var_dump($metasIndividuais);
	if($metasIndividuais['tipo'] == 1) {
		//valor
		$idMeta = $metasIndividuais['metas_id'];
		$objetivoMeta = $metasIndividuais['objetivo'];
		$variantePontos = $metasIndividuais['variante_pontos'];
		$bonificacao = $metasIndividuais['bonificacao'];
		$valoresParaMultiplicarValor = round($valor/$variantePontos);
		$pontosDeValor = $bonificacao * $valoresParaMultiplicarValor;
		$atualizaPontosValor = mysqli_query($con,"UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $valor, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeValor, c.pontos = c.pontos + $pontosDeValor, c.creditos = c.creditos + $pontosDeValor WHERE mc.metas_id = $idMeta AND mc.colaboradores_id = $idColaborador");
		$atualizaStatusMetaValor = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
	} else if($metasIndividuais['tipo'] == 2) {
		//quantidade
		$idMeta = $metasIndividuais['metas_id'];
		$objetivoMeta = $metasIndividuais['objetivo'];
		echo $objetivoMeta;
		$variantePontos = $metasIndividuais['variante_pontos'];
		$bonificacao = $metasIndividuais['bonificacao'];
		$valoresParaMultiplicarQuantidade = round($quantidade/$variantePontos);
		$pontosDeQuantidade = $bonificacao * $valoresParaMultiplicarQuantidade;
		$atualizaPontosQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + '$quantidade', mc.pontos_conquistados = mc.pontos_conquistados + '$pontosDeQuantidade', c.pontos = c.pontos + '$pontosDeQuantidade', c.creditos = c.creditos + '$pontosDeQuantidade' WHERE mc.metas_id = '$idMeta' AND mc.colaboradores_id = '$idColaborador'");			
		$atualizouPontos = mysqli_affected_rows($con);
		$atualizaStatusMetaQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
		$atualizouStatusMeta = mysqli_affected_rows($con);
		echo $atualizouStatusMeta;
	}
}
$mensagem = "Campanha individual";

// header("Location: ".$link."&mensagem=".$mensagem);
?>