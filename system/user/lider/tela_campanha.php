<html>
<head>
  <meta charset="utf-8">
  <title>Campanhas</title>
  <link rel="stylesheet" href="../../css/style_campanha_usuario.css">

</head>
<body>

  <?php
    $id_usuario = $_SESSION['id'];

  include "../../database/conexao_bd.php";
  $queryMetas = "";
  $queryCampanhasIndividuais = "SELECT DISTINCT * FROM campanhas INNER JOIN (SELECT id as metasId, metas.campanhas_id from metas)m ON m.campanhas_id=campanhas.id INNER JOIN (SELECT metas_id, metas_has_colaboradores.colaboradores_id from metas_has_colaboradores) mc ON mc.metas_id=m.metasId WHERE mc.colaboradores_id = '$id_usuario'";
  $queryCampanhasGrupo = "SELECT DISTINCT * FROM campanhas INNER JOIN (SELECT id AS metasId, metas.campanhas_id from metas) m ON m.campanhas_id=campanhas.id INNER JOIN (SELECT metas_has_colaboradores_has_grupos.metas_id, metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id from metas_has_colaboradores_has_grupos) mg on mg.metas_id=m.metasId INNER JOIN (SELECT id AS metasCol, colaboradores_has_grupos.colaboradores_id from colaboradores_has_grupos) cg ON cg.metasCol=mg.colaboradores_has_grupos_id WHERE cg.colaboradores_id = '$id_usuario'";
  $arrayCampanhas = array();
  $resultadoIndividuais = mysqli_query($con, $queryCampanhasIndividuais);
  $resultadoGrupos = mysqli_query($con, $queryCampanhasGrupo);
  while($linha = mysqli_fetch_array($resultadoIndividuais, MYSQLI_ASSOC)) {
    array_push($arrayCampanhas, $linha);
  }

  while($sos = mysqli_fetch_array($resultadoGrupos, MYSQLI_ASSOC)) {
    array_push($arrayCampanhas, $sos);
  }
  ?>
  <div class="borda" style=" margin-top:3%;">
    <form action="" method="POST">
      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Campanhas</label>
          <select class="custom-select mr-sm-2 select_campanha" name="campanhas" id="campanhas">
            <option>Selecione uma campanha</option>
            <?php foreach($arrayCampanhas as $campanha){?>
           
              <option  value="<?php echo $campanha["id"]; $id=$campanha["id"]?>" ><?php echo $campanha["nome"]; ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-success botao" name="editar">ver</button>
        </div>
      </form>

      <center>
        <h4>Informações da campanha</h4>
      </center>
      <hr>
      <div  style="overflow-y:auto; max-height:60vh;">
        <table class="table table-hover overflow-y">
          <thead  class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Tipo</th>
              <th scope="col">Data inicial</th>
              <th scope="col">Data final</th>
              <th scope="col">Tipo participantes</th>
            </tr>
          </thead>
          <tbody id="tabela">
            <?php
            if(isset($_POST) && $_POST['campanhas']!=""){
              $sql = "SELECT * FROM campanhas WHERE id = " . $_POST['campanhas'];
              $campanhas  = mysqli_query($con, $sql);

              foreach($campanhas AS $campanha):
                ?>
                <tr>
                  <td><?php echo $campanha['id']; ?></td>
                  <td><?php echo $campanha['nome']; ?></td>
                  <td><?php echo $campanha['descricao']; ?></td>
                  <?php if ($campanha['tipo'] == 1){ ?>
                    <td><?php echo "valor"; ?></td>
                    <?php }else{ ?>
                      <td><?php echo "Quantidade"; ?></td>
                      <?php } ?>
                      <td><?php echo date('d/m/Y', strtotime($campanha['data_inicial'])); ?></td>
                      <td><?php echo date('d/m/Y', strtotime($campanha['data_final'])); ?></td>
                      <?php if ($campanha['tipo_participantes'] == 0){ ?>
                        <td><?php echo "Individual"; ?></td>
                        <?php $queryMetas = "SELECT metas.id,metas.nome,metas.descricao,metas.pontos,metas.objetivo,metas.bonificacao,metas.variante_pontos,metas.tipo,metas_has_colaboradores.status FROM metas INNER JOIN metas_has_colaboradores ON metas.id=metas_has_colaboradores.metas_id AND metas_has_colaboradores.colaboradores_id='$id_usuario' WHERE metas.campanhas_id = ". $_POST['campanhas']?>
                        <?php }else{ ?>
                          <td><?php echo "Grupo"; ?></td>
                          <?php $queryMetas = "SELECT metas.id,metas.nome,metas.descricao,metas.pontos,metas.objetivo,metas.bonificacao,metas.variante_pontos,metas.tipo,metas_has_colaboradores_has_grupos.status FROM metas INNER JOIN metas_has_colaboradores_has_grupos ON metas.id=metas_has_colaboradores_has_grupos.metas_id INNER JOIN colaboradores_has_grupos ON metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id=colaboradores_has_grupos.id AND colaboradores_has_grupos.colaboradores_id= '$id_usuario' WHERE metas.campanhas_id = ". $_POST['campanhas']?>
                          <?php } ?>
                        </tr>
                        <?php
                      endforeach;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <hr>
              <center>
                <h4>Metas dessa campanha</h4>
              </center>
              <hr>
              <div  style="overflow-y:auto; max-height:35vh;">
                <table class="table table-hover overflow-y">
                  <thead  class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Bonificação</th>
                      <th scope="col">Variante pontos</th>
                      <th scope="col">Pontos</th>
                      <th scope="col">Objetivo</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody id="tabela">
                    <?php
                    if(isset($_POST) && $_POST['campanhas']!=""){
                      $metas  = mysqli_query($con, $queryMetas);

                      foreach($metas AS $meta):
                        ?>
                        <?php if ($meta['status'] == 0): ?>
                          <tr >
                            <td><?php echo $meta['id']; ?></td>
                            <td><?php echo $meta['nome']; ?></td>
                            <td><?php echo $meta['descricao']; ?></td>
                            <td><?php echo $meta['tipo']; ?></td>
                            <td><?php echo $meta['bonificacao']; ?></td>
                            <td><?php echo $meta['variante_pontos']; ?></td>
                            <td><?php echo $meta['pontos']; ?></td>
                            <td><?php echo $meta['objetivo']; ?></td>
                            <?php if ($meta['status'] == 0): ?>
                              <td ><?php echo "Não concluída" ?></td>
                            <?php else: ?>
                              <td><?php echo "Concluída" ?></td>
                            <?php endif; ?>
                          </tr>
                        <?php else: ?>
                          <tr class="table-success">
                            <td><?php echo $meta['id']; ?></td>
                            <td><?php echo $meta['nome']; ?></td>
                            <td><?php echo $meta['descricao']; ?></td>
                            <td><?php echo $meta['tipo']; ?></td>
                            <td><?php echo $meta['bonificacao']; ?></td>
                            <td><?php echo $meta['variante_pontos']; ?></td>
                            <td><?php echo $meta['pontos']; ?></td>
                            <td><?php echo $meta['objetivo']; ?></td>
                            <?php if ($meta['status'] == 0): ?>
                              <td ><?php echo "Não concluída" ?></td>
                            <?php else: ?>
                              <td><?php echo "Concluída" ?></td>
                            <?php endif; ?>
                          </tr>
                        <?php endif; ?>
                        <?php
                      endforeach;
                    }
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
      </body>
      </html>
