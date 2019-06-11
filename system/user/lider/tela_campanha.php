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
  $sql_sel =  "SELECT * FROM campanhas INNER JOIN colaboradores_has_campanhas ON colaboradores_has_campanhas.campanhas_id=campanhas.id WHERE colaboradores_has_campanhas.colaboradores_id ='$id_usuario' ";
  $result  = mysqli_query($con, $sql_sel);
  if (!$result) die ("Erro ao conectar usuário.");
  $campanhas = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>
  <div class="borda" style=" margin-top:3%;">
    <form action="" method="POST">
      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Campanhas</label>
          <select class="custom-select mr-sm-2 select_campanha" name="campanhas" id="campanhas">
            <option>Selecione uma campanha</option>
            <?php foreach($campanhas as $campanha){ ?>
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
              <th scope="col">Dataescricao</th>
              <th scope="col">Tipo</th>
              <th scope="col">Bonificacao</th>
              <th scope="col">Variante_pontos</th>
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
                      <td><?php echo $campanha['bonificacao']; ?></td>
                      <td><?php echo $campanha['variante_pontos']; ?></td>
                      <td><?php echo date('d/m/Y', strtotime($campanha['data_inicial'])); ?></td>
                      <td><?php echo date('d/m/Y', strtotime($campanha['data_final'])); ?></td>
                      <?php if ($campanha['tipo_participantes'] == 0){ ?>
                        <td><?php echo "Individual"; ?></td>
                        <?php }else{ ?>
                          <td><?php echo "Grupo"; ?></td>
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
                      <th scope="col">descricao</th>
                      <th scope="col">Pontos</th>
                      <th scope="col">Objetivo</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody id="tabela">
                    <?php
                    if(isset($_POST) && $_POST['campanhas']!=""){
                      $sql = "SELECT * FROM `metas` WHERE  campanhas_id = " . $_POST['campanhas'];
                      $meta  = mysqli_query($con, $sql);

                      foreach($meta AS $campanha):
                        ?>
                        <?php if ($campanha['status'] == 1): ?>
                          <tr >
                            <td><?php echo $campanha['id']; ?></td>
                            <td><?php echo $campanha['nome']; ?></td>
                            <td><?php echo $campanha['descricao']; ?></td>
                            <td><?php echo $campanha['pontos']; ?></td>
                            <td><?php echo $campanha['objetivo']; ?></td>
                            <?php if ($campanha['status'] == 1): ?>
                              <td ><?php echo "Não concluida" ?></td>
                            <?php else: ?>
                              <td><?php echo "Concluida" ?></td>
                            <?php endif; ?>
                          </tr>
                        <?php else: ?>
                          <tr class="table-success">
                            <td><?php echo $campanha['id']; ?></td>
                            <td><?php echo $campanha['nome']; ?></td>
                            <td><?php echo $campanha['descricao']; ?></td>
                            <td><?php echo $campanha['pontos']; ?></td>
                            <td><?php echo $campanha['objetivo']; ?></td>
                            <?php if ($campanha['status'] == 1): ?>
                              <td ><?php echo "Não concluida" ?></td>
                            <?php else: ?>
                              <td><?php echo "Concluida" ?></td>
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
