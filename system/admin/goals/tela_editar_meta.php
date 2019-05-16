<html>
  <head>
    <meta charset="utf-8">
    <title>Editar item</title>
    <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">

  </head>
  <body>

    <?php


      include "../../database/conexao_bd.php";


       $sql_sel =  "SELECT `id`, `nome`, `descricao`, `pontos`, `campanhas_id` FROM metas";



        $result  = mysqli_query($con, $sql_sel);

        if (!$result) die ("Erro ao conectar usuário.");

        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    ?>


    <div class="container">

        <div class="borda" style=" margin-top:3%;">
          <h1>Editar Itens</h1>
    <table class="table table-hover">
      <thead  class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Pontos</th>
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
          <td><?php echo $user['descricao']?></td>
          <td><?php echo $user['pontos']?></td>
          <td>
            <a data-toggle="modal" data-target="#modalEditar" data-whateverid="<?php echo $user['id']?>" data-whatevernome="<?php echo $user['nome']?>" data-whateverdescricao="<?php echo $user['descricao']?>" data-whateverpontos="<?php echo $user['pontos']?>" >
            <button type="button" class="btn btn-success" name="editar">Editar</button>
            </a>
            <a data-toggle="modal" data-target="#modalExcluir" data-whateverid="<?php echo $user['id']?>" data-whatevernome="<?php echo $user['nome']?>" >
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
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="nomeMeta" id="recipient-nome">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descrição:</label>
            <input type="textarea" class="form-control" name="decricaoMeta" id="recipient-descricao">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pontos:</label>
            <input type="number" class="form-control" name="pontosMeta" id="recipient-pontos">
          </div>

          <input type="hidden" name="id" id="id">

      </div>
      <?php
      if(isset($_GET['mensagem'])){
      ?>
      <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
        <?php echo $_GET['mensagem']; ?>
      </div>
      <?php
      }
      ?>
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
var descricao = button.data('whateverdescricao')
var pontos = button.data('whateverpontos')
var modal = $(this)
modal.find('.modal-title').text('Editar o item ' + nome)
modal.find('#id').val(id)
modal.find('#recipient-nome').val(nome)
modal.find('#recipient-descricao').val(descricao)
modal.find('#recipient-pontos').val(pontos)
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
        <p>Você realmente deseja excluir o item <?php echo $user['name'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="goals/excluir_meta.php?id=<?php echo $user['id'];?>">
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
var modal = $(this)
modal.find('.modal-body').text('Você realmente deseja excluir o item ' + nome + '?')
})
</script>
  </body>
</html>
