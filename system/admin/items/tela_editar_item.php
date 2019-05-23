<html>
  <head>
    <meta charset="utf-8">
    <title>Editar item</title>
    <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">

  </head>
  <body>

    <?php


      include "../../database/conexao_bd.php";


       $sql_sel =  "SELECT id, nome, valor, caminho, quantidade FROM itens WHERE tipo=2";



        $result  = mysqli_query($con, $sql_sel);

        if (!$result) die ("Erro ao conectar usuário.");

        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    ?>

    <div class="container">

        <div class="borda" style=" margin-top:3%;">
          <h1>Editar Itens</h1>
          <div  style="overflow-y:auto; max-height:500px;">
    <table class="table table-hover overflow-y">
      <thead  class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Valor</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Imagem</th>
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
          <td><?php echo $user['valor']?></td>
          <td><?php echo $user['quantidade']?></td>
          <td>  <img src="<?php echo $user['caminho']?> "width="100" height="100" ></td>
          <td>
            <a data-toggle="modal" data-target="#modalEditar" data-whateverid="<?php echo $user['id']?>" data-whatevernome="<?php echo $user['nome']?>" data-whateverid="<?php echo $user['id']?>" data-whatevervalor="<?php echo $user['valor']?>" data-whateverquantidade="<?php echo $user['quantidade']?>" data-whateverimagem="<?php echo $user['caminho']?>">
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
        <form action="items/editar_item.php" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="nomeItemDigital" id="recipient-nome">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valor:</label>
            <input type="number" class="form-control" name="valorItemDigital" id="recipient-valor">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input type="number" class="form-control" name="quantidadeItemDigital" id="recipient-quantidade">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Imagem:</label>
            <input type="file" accept="image/x-png,image/jpeg" name="imagemItemDigital" class="form-control" id="recipient-imagem">
          </div>
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="imagem" id="imagem">

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
var valor = button.data('whatevervalor')
var quantidade = button.data('whateverquantidade')
var imagem = button.data('whateverimagem')
var modal = $(this)
modal.find('.modal-title').text('Editar o item ' + nome)
modal.find('#id').val(id)
modal.find('#recipient-nome').val(nome)
modal.find('#recipient-valor').val(valor)
modal.find('#recipient-quantidade').val(quantidade)
modal.find('#imagem').val(imagem)

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
        <a href="items/deletar_item.php?id=<?php echo $user['id'];?>">
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
