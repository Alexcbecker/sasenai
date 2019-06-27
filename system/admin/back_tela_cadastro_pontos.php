<?php
session_start();
include "../../database/conexao_bd.php";

$idColaborador = $_POST['idColaborador'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$link     = "navbar.php?folder=&file=tela_cadastro_pontos.php";

$queryMetas = mysqli_query($con, "SELECT * FROM `metas` LEFT OUTER JOIN (select distinct id, campanhas.tipo_participantes from campanhas) c ON c.id=metas.campanhas_id");
$metas = mysqli_fetch_all($queryMetas, MYSQLI_ASSOC);

$queryMetasIndividuais = mysqli_query($con, "SELECT * FROM metas INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.metas_id = metas.id LEFT OUTER JOIN (select distinct id, campanhas.tipo_participantes from campanhas)c ON c.id=metas.campanhas_id WHERE metas_has_colaboradores.colaboradores_id = $idColaborador AND c.tipo_participantes = 0");
foreach ($queryMetasIndividuais as $metasIndividuais) {
	if($metasIndividuais['tipo'] == 1) {
		//valor
		$idMeta = $metasIndividuais['metas_id'];
		$objetivoMeta = $metasIndividuais['objetivo'];
		$variantePontos = $metasIndividuais['variante_pontos'];
		$bonificacao = $metasIndividuais['bonificacao'];
		$valoresParaMultiplicarValor = round($valor/$variantePontos);
		$pontosDeValor = $bonificacao * $valoresParaMultiplicarValor;
		$atualizaPontosValor = mysqli_query($con,"UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $valor, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeValor, c.pontos = c.pontos + $pontosDeValor, c.creditos = c.creditos + $pontosDeValor WHERE mc.metas_id = $idMeta AND mc.status = 0 AND mc.colaboradores_id = $idColaborador");
		$atualizaStatusMetaValor = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
		//Cadastrar pontos ao concluir a meta
		$atualizouStatusMeta = mysqli_affected_rows($con);
		echo($atualizouStatusMeta);
		if($atualizouStatusMeta = 1) {
			$pontosMeta = $metasIndividuais['pontos'];
			$atualizaPontosIndividual = mysqli_query($con,"UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.pontos_conquistados = mc.pontos_conquistados + $pontosMeta, c.pontos = c.pontos + $pontosMeta, c.creditos = c.creditos + $pontosMeta WHERE mc.metas_id = $idMeta AND mc.status = 1 AND mc.colaboradores_id = $idColaborador");
		}
	} else if($metasIndividuais['tipo'] == 2) {
		//quantidade
		$idMeta = $metasIndividuais['metas_id'];
		$objetivoMeta = $metasIndividuais['objetivo'];
		// echo $objetivoMeta;
		$variantePontos = $metasIndividuais['variante_pontos'];
		$bonificacao = $metasIndividuais['bonificacao'];
		$valoresParaMultiplicarQuantidade = round($quantidade/$variantePontos);
		$pontosDeQuantidade = $bonificacao * $valoresParaMultiplicarQuantidade;
		$atualizaPontosQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + '$quantidade', mc.pontos_conquistados = mc.pontos_conquistados + '$pontosDeQuantidade', c.pontos = c.pontos + '$pontosDeQuantidade', c.creditos = c.creditos + '$pontosDeQuantidade' WHERE mc.metas_id = '$idMeta' AND mc.status = 0  AND mc.colaboradores_id = '$idColaborador'");
		$atualizouPontos = mysqli_affected_rows($con);
		$atualizaStatusMetaQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores SET metas_has_colaboradores.status = 1 WHERE metas_has_colaboradores.objetivo_conquistado = $objetivoMeta");
		//Cadastrar pontos ao concluir a meta
		$atualizouStatusMeta = mysqli_affected_rows($con);
		if($atualizouStatusMeta = 1) {
			$pontosMeta = $metasIndividuais['pontos'];
			$atualizaPontosGrupo = mysqli_query($con,"UPDATE metas_has_colaboradores AS mc INNER JOIN colaboradores AS c ON mc.colaboradores_id=c.id SET mc.pontos_conquistados = mc.pontos_conquistados + $pontosMeta, c.pontos = c.pontos + $pontosMeta, c.creditos = c.creditos + $pontosMeta WHERE mc.metas_id = $idMeta AND mc.status = 1 AND mc.colaboradores_id = $idColaborador");
		}
	}
}

$select = "SELECT * FROM metas INNER JOIN metas_has_colaboradores_has_grupos ON metas_has_colaboradores_has_grupos.metas_id = metas.id LEFT OUTER JOIN (select distinct id, campanhas.tipo_participantes from campanhas)c ON c.id=metas.campanhas_id INNER JOIN(SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id WHERE cg.colaboradores_id = $idColaborador AND c.tipo_participantes = 1";

$queryMetasGrupo = mysqli_query($con, $select);
foreach ($queryMetasGrupo as $metasGrupo) {
	if($metasGrupo['tipo'] == 1) {
		//valor
		$idMeta = $metasGrupo['metas_id'];
		$objetivoMeta = $metasGrupo['objetivo'];
		$variantePontos = $metasGrupo['variante_pontos'];
		$bonificacao = $metasGrupo['bonificacao'];
		$valoresParaMultiplicarValor = round($valor/$variantePontos);
		$pontosDeValor = $bonificacao * $valoresParaMultiplicarValor;
		$atualizaValor = "UPDATE metas_has_colaboradores_has_grupos AS mc INNER JOIN (SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = mc.colaboradores_has_grupos_id INNER JOIN colaboradores AS c ON cg.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $valor, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeValor, c.pontos = c.pontos + $pontosDeValor, c.creditos = c.creditos + $pontosDeValor WHERE mc.metas_id = $idMeta AND mc.status = 0 AND cg.colaboradores_id = $idColaborador";
		$queryAtualizaValor = mysqli_query($con, $atualizaValor);
		$atualizaPontosGrupo = "UPDATE grupos INNER JOIN colaboradores_has_grupos ON colaboradores_has_grupos.grupos_id=grupos.id SET grupos.pontos = grupos.pontos + $pontosDeValor WHERE colaboradores_has_grupos.colaboradores_id=$idColaborador";
		$atualizaStatusMetaValor = mysqli_query($con, "UPDATE metas_has_colaboradores_has_grupos SET metas_has_colaboradores_has_grupos.status = 1 WHERE metas_has_colaboradores_has_grupos.objetivo_conquistado = $objetivoMeta");
		//Cadastrar pontos ao concluir a meta
		$atualizouStatusMeta = mysqli_affected_rows($con);
		if($atualizouStatusMeta = 1) {
			$pontosMetaGrupo = $metasGrupo['pontos'];
			$atualizaValor = "UPDATE metas_has_colaboradores_has_grupos AS mc INNER JOIN (SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = mc.colaboradores_has_grupos_id INNER JOIN colaboradores AS c ON cg.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $pontosMetaGrupo, mc.pontos_conquistados = mc.pontos_conquistados + $pontosMetaGrupo, c.pontos = c.pontos + $pontosMetaGrupo, c.creditos = c.creditos + $pontosMetaGrupo WHERE mc.metas_id = $idMeta AND mc.status = 1 AND cg.colaboradores_id = $idColaborador";
			// UPDATE metas_has_colaboradores_has_grupos AS mc INNER JOIN (SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = mc.colaboradores_has_grupos_id INNER JOIN colaboradores AS c ON cg.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $pontosMetaGrupo, mc.pontos_conquistados = mc.pontos_conquistados + $pontosMetaGrupo, c.pontos = c.pontos + $pontosMetaGrupo, c.creditos = c.creditos + $pontosMetaGrupo WHERE mc.metas_id = $idMeta AND mc.status = 1 AND cg.colaboradores_id = $idColaborador";
			$queryAtualizaValor = mysqli_query($con, $atualizaValor);
			$atualizaPontosGrupo = "UPDATE grupos INNER JOIN colaboradores_has_grupos ON colaboradores_has_grupos.grupos_id=grupos.id SET grupos.pontos = grupos.pontos + $pontosMetaGrupo WHERE colaboradores_has_grupos.colaboradores_id=$idColaborador";
		}
	} else if($metasGrupo['tipo'] == 2) {
		//quantidade
		$idMeta = $metasGrupo['metas_id'];
		$objetivoMeta = $metasGrupo['objetivo'];
		$variantePontos = $metasGrupo['variante_pontos'];
		$bonificacao = $metasGrupo['bonificacao'];
		$valoresParaMultiplicarQuantidade = round($quantidade/$variantePontos);
		$pontosDeQuantidade = $bonificacao * $valoresParaMultiplicarQuantidade;
		$atualizaQuantidade = "UPDATE metas_has_colaboradores_has_grupos AS mc INNER JOIN (SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = mc.colaboradores_has_grupos_id INNER JOIN colaboradores AS c ON cg.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $quantidade, mc.pontos_conquistados = mc.pontos_conquistados + $pontosDeQuantidade, c.pontos = c.pontos + $pontosDeQuantidade, c.creditos = c.creditos + $pontosDeQuantidade WHERE mc.metas_id = $idMeta AND mc.status = 0 AND cg.colaboradores_id = $idColaborador";
		$queryAtualizaQuantidade = mysqli_query($con, $atualizaQuantidade);
		$atualizaPontosGrupo = "UPDATE grupos INNER JOIN colaboradores_has_grupos ON colaboradores_has_grupos.grupos_id=grupos.id SET grupos.pontos = grupos.pontos + $pontosDeQuantidade WHERE colaboradores_has_grupos.colaboradores_id=$idColaborador";
		$atualizaStatusMetaQuantidade = mysqli_query($con, "UPDATE metas_has_colaboradores_has_grupos SET metas_has_colaboradores_has_grupos.status = 1 WHERE metas_has_colaboradores_has_grupos.objetivo_conquistado = $objetivoMeta");
		//Cadastrar pontos ao concluir a meta
		$atualizouStatusMeta = mysqli_affected_rows($con);
		if($atualizouStatusMeta = 1) {
			$pontosMetaGrupo = $metasGrupo['pontos'];
			$atualizaValor = "UPDATE metas_has_colaboradores_has_grupos AS mc INNER JOIN (SELECT id, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos)cg ON cg.id = mc.colaboradores_has_grupos_id INNER JOIN colaboradores AS c ON cg.colaboradores_id=c.id SET mc.objetivo_conquistado = mc.objetivo_conquistado + $pontosMetaGrupo, mc.pontos_conquistados = mc.pontos_conquistados + $pontosMetaGrupo, c.pontos = c.pontos + $pontosMetaGrupo, c.creditos = c.creditos + $pontosMetaGrupo WHERE mc.metas_id = $idMeta AND mc.status = 1 AND cg.colaboradores_id = $idColaborador";
			$queryAtualizaValor = mysqli_query($con, $atualizaValor);
			$atualizaPontosGrupo = "UPDATE grupos INNER JOIN colaboradores_has_grupos ON colaboradores_has_grupos.grupos_id=grupos.id SET grupos.pontos = grupos.pontos + $pontosMetaGrupo WHERE colaboradores_has_grupos.colaboradores_id=$idColaborador";
		}
	}
}

?>
