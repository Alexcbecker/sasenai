
<html>
<head>
  <meta charset="utf-8">
  <title>Editar item</title>
  <link rel="stylesheet" href="../../css/style_campanha_usuario.css">

</head>
<body>

  <?php


  include "../../database/conexao_bd.php";


  $sql_sel =  "SELECT * FROM metas ";
  $result  = mysqli_query($con, $sql_sel);
  if (!$result) die ("Erro ao conectar usuário.");
  $metas = mysqli_fetch_all($result, MYSQLI_ASSOC);



  ?>



  <div class="container">


    <div class="borda" style=" margin-top:3%;">

        <form action="" method="POST">

          <div class="form-row align-items-center">
            <div class="col-auto my-1">

              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Meta</label>
              <select class="custom-select mr-sm-2 select_campanha" name="metas" id="metas">
                <option>Selecione uma meta</option>
                <?php foreach ($metas as $meta ){

                  if ($meta['status'] == 1) {

                  }else{
                   ?>

                  <option  value="<?php echo $meta["id"]; $id=$meta["id"]?>" ><?php echo $meta["nome"]; ?></option>
                  <?php }
                    }
                  ?>
                </select>
              </div>

              <button type="submit" class="btn btn-success botao" >ver</button>
            </div>
          </form>



        <h1>Editar Meta</h1>
        <div  style="overflow-y:auto; max-height:60vh;">
          <table class="table table-hover">
            <thead  class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pontos</th>
                <th scope="col">Objetivo</th>
                <th scope="col">Campanha</th>
                <th scope="col">Tipo</th>
                <th scope="col">Bonificação</th>
                <th scope="col">Variante de pontos</th>
                <th scope="col">Ações</th>

              </tr>
            </thead>
            <tbody>

              <tbody id="tabela">
                <?php

                if(isset($_POST) && $_POST['metas']!=""){
                  $sql = "SELECT * FROM metas WHERE id = " .$_POST['metas'];
                  $metas  = mysqli_query($con, $sql);
                  foreach ($metas as $meta ) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $meta['id']?></th>
                      <td><?php echo $meta['nome']?></td>
                      <td><?php echo $meta['descricao']?></td>
                      <td><?php echo $meta['pontos']?></td>
                      <td><?php echo $meta['objetivo']?></td>
                      <td><?php echo $meta['campanhas_id']?></td>
                      <?php if ($meta['tipo'] == 1): ?>
                        <td><?php echo 'Valor'?></td>
                      <?php else: ?>
                        <td><?php echo 'Quantidade'?></td>
                      <?php endif; ?>
                      <td><?php echo $meta['bonificacao']?></td>
                      <td><?php echo $meta['variante_pontos']?></td>



                      <td>
                        <a data-toggle="modal" data-target="#modalEditar" data-id="<?php echo $meta['id']?>" data-variantepontos="<?php echo $meta['variante_pontos']?>" data-bonificacao="<?php echo $meta['bonificacao']?>" data-tipo="<?php echo $meta['tipo']?>" data-campanhasid="<?php echo $meta['campanhas_id']?>" data-objetivo="<?php echo $meta['objetivo']?>" data-nome="<?php echo $meta['nome']?>" data-descricao="<?php echo $meta['descricao']?>" data-pontos="<?php echo $meta['pontos']?>" >
                          <button type="button" class="btn btn-success" name="editar" >Editar</button>
                        </a>
                        <a data-toggle="modal" data-target="#modalExcluir" data-id="<?php echo $meta['id']?>" data-nome="<?php echo $meta['nome']?>" >
                          <button type="button" class="btn btn-danger" name="editar">Concluir meta</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>

          </div>
          <?php
          $tipo_participantes = "SELECT campanhas.id,tipo_participantes FROM campanhas INNER JOIN metas ON metas.campanhas_id=campanhas.id where metas.id=".$_POST['metas'];
          $tipo = mysqli_query($con, $tipo_participantes);
          foreach ($tipo as $value) {


           ?>

          <?php if($value['tipo_participantes'] == 0){ ?>
            <h1>Colaboradores</h1>
            <div  style="overflow-y:auto; max-height:60vh;">
              <table class="table table-hover">
                <thead  class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">ações</th>

                  </tr>
                </thead>


                <tbody id="tabela">
                  <?php
                  if(isset($_POST) && $_POST['metas']!=""){


                    $sql = "SELECT * FROM colaboradores INNER JOIN metas_has_colaboradores AS mc ON mc.colaboradores_id = colaboradores.id WHERE mc.metas_id=".$_POST['metas'];
                    $colaboradores  = mysqli_query($con, $sql);


                    foreach ($colaboradores as $colaborador ) {

                      ?>
                      <tr>
                        <th scope="row"><?php echo $colaborador['id']?></th>
                        <td><?php echo $colaborador['nome']?></td>
                        <td><?php echo $colaborador['cpf']?></td>
                        <td><?php echo $colaborador['email']?></td>
                        <?php if($colaborador['tipo'] == 2){ ?>
                          <td>Líder</td><?php } else{ ?>
                            <td>Usuário</td>
                            <?php } ?>


                            <td>
                              <a data-toggle="modal" data-target="#modalExcluirUsuario" data-id="<?php echo $colaborador['id']?>" data-nome="<?php echo $colaborador['nome']?>" >
                                <button type="button" class="btn btn-danger" name="editar">Remover</button>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

          <?php }else{ ?>
            <h1>Grupos</h1>
            <div  style="overflow-y:auto; max-height:60vh;">
              <table class="table table-hover">
                <thead  class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>

                  </tr>
                </thead>


                <tbody id="tabela">
                  <?php
                  if(isset($_POST) && $_POST['metas']!=""){

//SELECT * FROM grupos INNER JOIN (SELECT id AS idCg, colaboradores_has_grupos.grupos_id FROM colaboradores_has_grupos)cg ON grupos.id=cg.idCg INNER JOIN (SELECT metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id, metas_has_colaboradores_has_grupos.metas_id FROM metas_has_colaboradores_has_grupos) mg ON cg.idCg=mg.colaboradores_has_grupos_id WHERE mg.metas_id
                    $sql = "SELECT *, grupos.id as 'grupoid' FROM grupos INNER JOIN colaboradores_has_grupos ON grupos.id=colaboradores_has_grupos.grupos_id INNER JOIN metas_has_colaboradores_has_grupos ON metas_has_colaboradores_has_grupos.colaboradores_has_grupos_id= colaboradores_has_grupos.id WHERE metas_has_colaboradores_has_grupos.metas_id = ".$_POST['metas']." GROUP BY grupos.id";
                    $grupos  = mysqli_query($con, $sql);


                    foreach ($grupos as $grupo ) {

                      ?>
                      <tr>
                        <th scope="row"><?php echo $grupo['colaboradores_has_grupos_id']?></th>
                        <td><?php echo $grupo['nome']?></td>
                        <td><?php echo $grupo['descricao']?></td>
                        <?php if($grupo['status'] == 0){ ?>
                          <td>Ativo</td><?php } else{ ?>
                            <td>Desativado</td>
                            <?php } ?>


                            <td>
                              <a data-toggle="modal" data-target="#modalExcluirGrupo" data-idmetas="<?php echo $_POST['metas'] ?>" data-id="<?php echo $grupo['grupoid']?>" data-nome="<?php echo $grupo['nome']?>" >
                                <button type="button" class="btn btn-danger" name="editar">Remover</button>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>

                </div>
          <?php
            }
            }
            ?>


                <?php
                if(isset($_GET['mensagem'])){
                  ?>
                  <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
                    <?php echo $_GET['mensagem']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </div>
                    <?php
                  }
                  ?>
</div>
</div>

                      <!-- Modal Editar -->

                      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="goals/editar_meta.php" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nome da meta</label>
                                  <input type="text" class="form-control" name="nomeMeta" id="recipient-nome">
                                </div>
                                <div  class="form-group">
                                  <label  for="exampleFormControlInput1">Tipo de pontuação</label>
                                  <select name="tipoMeta" id="recipient-tipo" class="form-control form-control-chosen" data-placeholder="Selecione o método" required="required">
                                    <option value="1">Valor</option>
                                    <option value="2">Quantidade</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleF ormControlTextarea1">Pontos da meta</label>
                                  <input type="number" class="form-control" name="pontosMeta" id="recipient-pontos">
                                </div>
                                <div class="form-group">
                                  <label for="exampleF ormControlTextarea1">Objetivo</label>
                                  <input type="number" class="form-control" name="objetivoMeta" id="recipient-objetivo">
                                </div>

                                <div class="form-row">
                                  <div class="col">
                                    <label for="pontuacao"></label>
                                    Bonificação   <input type="number" class="form-control" name="bonificacaoMeta" id="recipient-bonificacao">

                                  </div>
                                  <div class="col">
                                    <label for="variante_de_pontos"></label>
                                    Variante de Pontos   <input type="number" class="form-control" name="variante_pontosMeta" id="recipient-variante">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Descrição da meta</label>
                                  <input type="textarea" class="form-control" name="descricaoMeta" id="recipient-descricao">
                                </div>

                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="campanhasid" id="campanhasid">


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Enviar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('#modalEditar').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var id = button.data('id')
                        var campanhasid = button.data('campanhasid')
                        var nome = button.data('nome')
                        var descricao = button.data('descricao')
                        var pontos = button.data('pontos')
                        var objetivo = button.data('objetivo')
                        var tipo = button.data('tipo')
                        var bonificacao = button.data('bonificacao')
                        var variantePontos = button.data('variantepontos')
                        var modal = $(this)
                        modal.find('.modal-title').text('Editar a meta ' + nome)
                        modal.find('#id').val(id)
                        modal.find('#campanhasid').val(campanhasid)
                        modal.find('#recipient-nome').val(nome)
                        modal.find('#recipient-descricao').val(descricao)
                        modal.find('#recipient-pontos').val(pontos)
                        modal.find('#recipient-objetivo').val(objetivo)
                        modal.find('#recipient-tipo').val(tipo)
                        modal.find('#recipient-bonificacao').val(bonificacao)
                        modal.find('#recipient-variante').val(variantePontos)
                      })
                      </script>


                      <!-- Modal Excluir -->
                      <div class="modal" id="modalExcluir" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Concluir meta</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <p id="msg">Você realmente deseja marcar como concluida a meta <?php echo $meta['name'];?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              <a id="link" href="goals/excluir_meta.php?id=">
                                <button type="button" class="btn btn-success">Concluir</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('#modalExcluir').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var id = button.data('id')
                        var nome = button.data('nome')
                        var modal = $(this)
                        modal.find('#msg').text('Você realmente deseja marcar como concluída a meta ( ' + nome + ' ) ?')
                        modal.find('#link').attr("href","goals/excluir_meta.php?id="+id)
                      })
                      </script>

                      <!-- Modal Excluir Grupo -->
                      <div class="modal" id="modalExcluirGrupo" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Remover o grupo desta meta</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <p id="msg">Você realmente deseja remover o grupo <?php echo $meta['name'];?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              <a id="link" href="goals/remover_grupo_meta.php?id=&meta">
                                <button type="button" class="btn btn-success">Remover</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('#modalExcluirGrupo').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var idmetas = button.data('idmetas')
                        var id = button.data('id')
                        var nome = button.data('nome')
                        var modal = $(this)
                        modal.find('#msg').text('Você realmente deseja remover o grupo ( ' + nome + ' ) ?')
                        modal.find('#link').attr("href","goals/remover_grupo_meta.php?id="+id+"&meta="+idmetas)
                      })
                      </script>



                      <!-- Modal Excluir Usuario -->
                      <div class="modal" id="modalExcluirUsuario" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Remover o usuário desta meta</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <p id="msg">Você realmente deseja deseja remover o usuário <?php echo $colaborador['name'];?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              <a id="link" href="goals/remover_usuario_meta.php?id=">
                                <button type="button" class="btn btn-success">Remover</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('#modalExcluirUsuario').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        var id = button.data('id')
                        var nome = button.data('nome')
                        var modal = $(this)
                        modal.find('#msg').text('Você realmente deseja deseja remover o usuário ( ' + nome + ' ) ?')
                        modal.find('#link').attr("href","goals/remover_usuario_meta.php?id="+id)
                      })
                      </script>



                    </body>
                    </html>
