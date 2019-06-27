<html>
  <head>
    <meta charset="utf-8">
    <title>Editar item</title>
    <link rel="stylesheet" href="../../css/style_base_cadastro_editar.css">
    <link href="../../css/componente_multiselecao.css" rel="stylesheet">

  </head>
  <body>

    <?php


      include "../../database/conexao_bd.php";
      $con = mysqli_connect("localhost","root","root","bd_fito");






          $select = mysqli_query($con,"SELECT `id`, `nome` FROM grupos");

          $grupos = array();

          while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
            array_push($grupos,$linha);
          }

//

        $select = mysqli_query($con,"SELECT id,nome FROM colaboradores WHERE tipo='2' ORDER BY nome");

        $lider = array();

        while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
          array_push($lider,$linha);
        }

//

        $select = mysqli_query($con,"SELECT id,nome FROM colaboradores WHERE tipo='3' ORDER BY nome");

        $colaborador = array();

        while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
        	array_push($colaborador,$linha);
        }
//

        $select = mysqli_query($con,"SELECT * from colaboradores_has_grupos ORDER BY nome");

        $colab_grupo = array();

        while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
          array_push($colab_grupo,$linha);
        }
    ?>


    <div class="container">

        <div class="borda" style=" margin-top:3%;">
          <h1>Editar Grupos</h1>
          <div  style="overflow-y:auto; max-height:500px;">
    <table class="table table-hover">
      <thead  class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome do grupo</th>
          <th scope="col">Líder</th>
          <th scope="col">Colaborador</th>
          <th scope="col">Ações</th>

        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($grupos as $grupo) {
         ?>
        <tr>
          <th scope="row"><?php echo $grupo['id']?></th>
          <td><?php echo $grupo['nome']?></td>
          <?php
            foreach ($lider as $lideres) {
           ?>
          <td><?php  echo $lideres['nome'] ?></td>
          <?php
        }
            foreach ($colaborador as $colaboradores) {
           ?>
          <td><?php echo $colaboradores['nome']?></td>
          <?php
            }
           ?>
          <td>
            <a data-toggle="modal" data-target="#modalEditar" data-whateverid="<?php echo $grupo['id']?>" >
            <button type="button" class="btn btn-success" name="editar">Editar</button>
            </a>
            <a data-toggle="modal" data-target="#modalExcluir" data-whateverid="<?php echo $grupo['id']?>" data-whatevernome="<?php echo $grupo['nome']?>" >
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
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
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
        <form action="teams/estruturar_grupo.php" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Líder:</label>
              <select name="liderGrupo" class="custom-select custom-select-lg mb-3" id="recipient-lider" required="required">
                <option selected>...</option>
                  <?php foreach($lider as $key => $value){ ?>
                <option  value="<?php echo $value["id"]; ?>" ><?php echo $value["nome"]; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div  class="form-group">
            <label  for="recipient-name" class="col-form-label">Colaborador:</label>
              <select id="multiple" name="usuarios[]" class="form-control form-control-chosen" data-placeholder="Por favor, selecione..." multiple="multiple" required="required">
                <?php foreach($colaborador as $key => $value){ ?>
                  <option  value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
                <?php } ?>
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
var lider = button.data('whateverlider')
var colaborador = button.data('whatevercolaborador')
var modal = $(this)
modal.find('.modal-title').text('Editar o item ' + nome)
modal.find('#id').val(id)
modal.find('#recipient-nome').val(nome)
modal.find('#multiple').val(colaborador)
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
        <p id="msg">Você realmente deseja excluir todos os colaboradores do grupo <?php echo $grupo['name'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a id="link" href="teams/excluir_grupo.php?id=">
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
modal.find('#msg').text('Você realmente deseja excluir o item ( ' + nome + ' ) ?')
modal.find('#link').attr("href","teams/excluir_grupo.php?id="+id)
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $('.form-control-chosen').chosen();
</script>
  </body>
</html>
