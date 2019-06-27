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


       $sql_sel =  "SELECT `id`, `nome`, `descricao` FROM grupos where status = 0";



        $result  = mysqli_query($con, $sql_sel);

        if (!$result) die ("Erro ao conectar usuário.");

        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


        $select = mysqli_query($con,"SELECT * from colaboradores_has_grupos ORDER BY nome");

        $colab_grupo = array();

        while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
          array_push($colab_grupo,$linha);
        }

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

$select = mysqli_query($con,"SELECT colaboradores.nome AS 'colaboradornome', colaboradores.tipo AS 'colaboradortipo', grupos.nome AS 'gruponome', grupos.id AS 'grupoid'
      FROM grupos
      INNER JOIN colaboradores_has_grupos
      ON colaboradores_has_grupos.grupos_id = grupos.id
      INNER JOIN colaboradores
      ON colaboradores_has_grupos.colaboradores_id=colaboradores.id");

$mostrar = array();

while($linha = mysqli_fetch_array($select,MYSQLI_ASSOC)){
  array_push($mostrar,$linha);
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
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Ações</th>

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
          <td>
            <a data-toggle="modal" data-target="#modalEditar" data-whateverid="<?php echo $user['id']?>" data-whatevernome="<?php echo $user['nome']?>" data-whateverdescricao="<?php echo $user['descricao']?>">
            <button type="button" class="btn btn-primary" name="editar">Editar</button>
            </a>
            <a data-toggle="modal" data-target="#modalAdicionar" data-whateverid="<?php echo $user['id']?>" data-whatevernome="<?php echo $user['nome']?>" data-whateverdescricao="<?php echo $user['descricao']?>">
            <button type="button" class="btn btn-success" name="adicionar">Adicionar</button>
            </a>

          <a data-toggle="modal" data-target="#modalVisualizar" data-whateverid="<?php echo $user['id']?>">
          <button type="button" class="btn btn-info" name="Visualizar">Visualizar</button>
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
        <form action="teams/editar_grupo.php" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="nomeGrupo" id="recipient-nome">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descrição:</label>
            <input type="textarea" class="form-control" name="decricaoGrupo" id="recipient-descricao">
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
var descricao = button.data('whateverdescricao')
var modal = $(this)
modal.find('.modal-title').text('Editar o item ' + nome)
modal.find('#id').val(id)
modal.find('#recipient-nome').val(nome)
modal.find('#recipient-descricao').val(descricao)
})
</script>

<!-- Modal Adicionar -->

<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <select name="liderGrupo" class="custom-select custom-select-lg mb-3" id="recipient-lider" >
                <option selected>...</option>
                  <?php foreach($lider as $key => $value){ ?>
                <option  value="<?php echo $value["id"]; ?>" ><?php echo $value["nome"]; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div  class="form-group">
            <label  for="recipient-name" class="col-form-label">Colaborador:</label>
              <select id="multiple" name="usuarios[]" class="form-control form-control-chosen" data-placeholder="Por favor, selecione..." multiple="multiple">
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
$('#modalAdicionar').on('show.bs.modal', function (event) {
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

<!-- Modal Visualizar -->

<div class="modal fade bd-example-modal-xl" id="modalVisualizar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Participantes do grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
          <div class="modal-body">
            <div class="container">
              <table class="table table-hover">
                <thead class="thead-dark">
                      <tr>
                        <th scope="col">Líder</th>
                      </tr>
                    </thead>
                    <tbody id="tblLideres">
                      <?php foreach ($mostrar as $mostrar_usuarios ) {?>
                       <?php if($mostrar_usuarios['colaboradortipo'] == 2 && $mostrar_usuarios['grupoid'] == id){?>
                      <tr>
                        <td><?php echo $mostrar_usuarios["colaboradornome"]; ?></td>
                      </tr>
                        <?php  }?>
                      <?php  }?>
                    </tbody>
              </table>
              <table class="table table-hover">
                <thead class="thead-dark">
                      <tr>
                        <th scope="col">Colaborador</th>
                      </tr>
                    </thead>
                    <tbody id="tblColaboradores">
                      <?php foreach ($mostrar as $mostrar_usuarios ) { ?>
                        <?php if($mostrar_usuarios['colaboradortipo'] == 3 && $mostrar_usuarios['grupoid'] == id){?>
                      <tr>
                        <td><?php echo $mostrar_usuarios["colaboradornome"]; ?></td>
                      </tr>
                        <?php  }?>
                      <?php  }?>
                    </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('#modalVisualizar').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var id_grupo = button.data('whateverid')
var modal = $(this)
modal.find('#id').val(id)
  $.ajax({
    method: "POST",
    url: "teams/visualizar_integrantes.php",
    data: { id: id_grupo }
  }).done(function(dados){
    objDados = JSON.parse(dados);
    $("#tblLideres").empty();
    $("#tblColaboradores").empty();

    $(objDados).each(function(item){
      console.log(objDados[item][1]);
      if(objDados[item][1] == 2 ){
          $("#tblLideres").append("<tr><td>" + objDados[item][0] + "</td></tr>");
      }
      else if(objDados[item][1] == 3){
          $("#tblColaboradores").append("<tr><td>" + objDados[item][0] + "</td></tr>");

      }


    })

  });
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
        <p id="msg">Você realmente deseja excluir o grupo <?php echo $user['name'];?></p>
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
