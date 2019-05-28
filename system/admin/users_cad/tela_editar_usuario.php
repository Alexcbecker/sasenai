<html>
<head>
  <meta charset="utf-8">
  <title>Editar usuário</title>
  <link rel="stylesheet" href="../../css/style_editar_usuario.css">
</head>
<body>
  <?php
  include "../../database/conexao_bd.php";
  $sql_sel =  "SELECT * FROM `colaboradores` WHERE tipo IN (2,3)";
  $result  = mysqli_query($con, $sql_sel);
  if (!$result) die ("Erro ao conectar usuário.");
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

  <div class="container">
    <div class="borda" style=" margin-top:3%;">
      <h1>Editar usuário</h1>
      <div  style="overflow-y:auto; max-height:500px;">
        <table class="table table-hover overflow-y">
          <thead  class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">E-mail</th>
              <th scope="col">Tipo</th>
              <th scope="col">Sexo</th>
              <th scope="col">Status</th>
              <th scope="col">ações</th>

            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($users as $user ) {
              ?>
              <tr>
                <th scope="row"><?php echo $user['id']?></th>
                <td><?php echo $user['nome']?></td>
                <td><?php echo $user['cpf']?></td>
                <td><?php echo $user['email']?></td>
                <?php if($user['tipo'] == 2){ ?>
                <td>Líder</td><?php } else{ ?>
                    <td>Usuário</td>
                <?php } ?>

                    <?php if($user['sexo'] == 2){ ?>
                      <td><?php echo "F"; ?></td>
                      <?php }else{ ?>
                        <td><?php echo "M";?></td>
                        <?php } ?>

                        <?php if($user['status'] == 0){ ?>
                          <td><?php echo "Ativo"; ?></td>
                          <?php }else{ ?>
                            <td><?php echo "Desativado";?></td>
                            <?php } ?>

                            <td>
                              <a data-toggle="modal" data-target="#modalEditar" data-whateverid="<?php echo $user['id']?>" data-whateverstatus="<?php echo $user['status']?>" data-whatevernome="<?php echo $user['nome']?>" data-whatevercpf="<?php echo $user['cpf']?>" data-whateveremail="<?php echo $user['email']?>" data-whatevertipo="<?php echo $user['tipo']?>" data-whateversexo="<?php echo $user['sexo']?>">
                                <button type="button" class="btn btn-success" name="editar">Editar</button>
                              </a>
                              <a data-toggle="modal" data-target="#modalExcluir" data-whateverid="<?php echo $user['id']?>" data-whateverstatus="<?php echo $user['status']?>" data-whatevernome="<?php echo $user['nome']?>" data-whatevercpf="<?php echo $user['cpf']?>" data-whateveremail="<?php echo $user['email']?>" data-whatevertipo="<?php echo $user['tipo']?>" data-whateversexo="<?php echo $user['sexo']?>">
                                <button type="button" class="btn btn-danger" name="editar">Excluir</button>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if(isset($_GET['mensagem'])){
                      ?>
                      <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
                        <?php echo $_GET['mensagem']; ?>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
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
                      <form action="users_cad/editar_usuario.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nome:</label>
                          <input type="text" class="form-control" name="nomeUsuario" id="recipient-nome">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">E-mail:</label>
                          <input type="email" class="form-control" name="emailUsuario" id="recipient-email">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">CPC:</label>
                          <input type="number" class="form-control" name="cpfUsuario" id="recipient-cpf">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Sexo</label>
                          <select class="custom-select custom-select-lg mb-3" name="tipoUsuario" id="recipient-tipo">
                            <option selected>Tipo</option>
                            <option value="2">Lider</option>
                            <option value="3">Colaborador</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Sexo</label>
                          <select class="custom-select custom-select-lg mb-3" name="sexoUsuario" id="recipient-sexo">
                            <option selected>Sexo</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Status</label>
                          <select class="custom-select custom-select-lg mb-3" name="statusUsuario" id="recipient-status">
                            <option selected>Status</option>
                            <option value="0">Ativo</option>
                            <option value="1">Desativado</option>
                          </select>
                        </div>

                        <input type="hidden" name="id" id="id">

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
                var id = button.data('whateverid')
                var nome = button.data('whatevernome')
                var email = button.data('whateveremail')
                var cpf = button.data('whatevercpf')
                var tipo = button.data('whatevertipo')
                var sexo = button.data('whateversexo')
                var status = button.data('whateverstatus')
                var modal = $(this)
                modal.find('.modal-title').text('Editar o item ' + nome)
                modal.find('#id').val(id)
                modal.find('#recipient-nome').val(nome)
                modal.find('#recipient-email').val(email)
                modal.find('#recipient-cpf').val(cpf)
                modal.find('#recipient-tipo').val(tipo)
                modal.find('#recipient-sexo').val(sexo)
                modal.find('#recipient-status').val(status)


              })
              </script>


              <!-- Modal Excluir -->

              <div class="modal" id="modalExcluir" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Excluir</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Você realmente deseja excluir o usuário <?php echo $user['name'];?></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      <a href="users_cad/excluir_usuario.php?id=<?php echo $user['id'];?>">
                        <button type="button" class="btn btn-success">Excluir</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <script>
              $('#modalExcluir').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('whateverid')
                var nome = button.data('whatevernome')
                var email = button.data('whateveremail')
                var cpf = button.data('whatevercpf')
                var tipo = button.data('whatevertipo')
                var sexo = button.data('whateversexo')
                var status = button.data('whateverstatus')
                var modal = $(this)
                modal.find('.modal-body').text('Você realmente deseja excluir o usuário ' + nome + '?')
              })
              </script>

            </body>
            </html>
