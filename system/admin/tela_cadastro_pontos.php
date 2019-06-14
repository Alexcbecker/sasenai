
<html>
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../../css/style_adm_points.css">
</head>
<body>
  <?php
  include "../../database/conexao_bd.php";
  $sql_sel =  "SELECT * FROM `campanhas`";
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
          <button type="submit" class="btn btn-success botao" name="editar">Ver</button>
        </div>
      </form>
        <div  style="overflow-y:auto; max-height:60vh;">
          <h4 style="text-align:center;">Informações da Campanha</h4>
          <hr>
          <table class="table table-hover overflow-y">
            <thead  class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Início</th>
                <th scope="col">Fim</th>
                <th scope="col">Tipo de Participantes</th>
              </tr>
            </thead>
            <tbody id="tabela">
              <?php
              if(isset($_POST) && $_POST['campanhas']!=""){
                $sql = "SELECT * FROM campanhas WHERE id = " . $_POST['campanhas'];
                $campanhas  = mysqli_query($con, $sql);
              
                foreach($campanhas AS $campanha):
                $idCampanha= $campanha['id'];
              ?>
                <tr>
                  <td><?php echo $campanha['id']; ?></td>
                  <td><?php echo $campanha['nome']; ?></td>
                  <td><?php echo $campanha['descricao']; ?></td>
                  <td><?php echo $campanha['data_inicial']; ?></td>
                  <td><?php echo $campanha['data_final']; ?></td>
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
          <hr>
          <h4 style="text-align:center;">Participantes da campanha</h4>
          <hr>
          <table class="table table-hover overflow-y">
            <thead  class="thead-dark">
              <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="tabela">
              <?php
              if(isset($_POST) && $_POST['campanhas']!=""){
                $sql = "SELECT * FROM colaboradores INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.colaboradores_id=colaboradores.id INNER JOIN metas ON metas.id=metas_has_colaboradores.metas_id where metas.campanhas_id = '$idCampanha' AND colaboradores.status = 0";
                $colaboradores  = mysqli_query($con, $sql);

                foreach($colaboradores AS $colaborador):
                  var_dump($colaborador);
              ?>
                <tr>
                  <td><?php echo $colaborador['cpf'];?></td>
                  <td><?php echo $colaborador['nome'];?></td>
                  <?php if ($colaborador['tipo'] == 2){ ?>
                    <td><?php echo "Líder"; ?></td>
                  <?php }else if($colaborador['tipo'] == 3) { ?>
                    <td><?php echo "Usuário comum"; ?></td>
                  <?php } ?>
                  <td><input type="number" class="form-control" id="value" aria-describedby="Valor" placeholder="Digite o valor" required></td>  
                  <td><input type="number" class="form-control" id="quantidade" aria-describedby="Quantidade" placeholder="Digite a quantidade" required></td>  
                  <td><button type="submit" class="btn btn-success botao" name="editar">Enviar</button></td>                        
                </tr>
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

