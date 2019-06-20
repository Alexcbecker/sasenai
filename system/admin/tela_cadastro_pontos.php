
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
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="tabela">
              <?php
              if(isset($_POST)){
                $sql = "SELECT * FROM colaboradores INNER JOIN metas_has_colaboradores ON metas_has_colaboradores.colaboradores_id=colaboradores.id where colaboradores.status = 0";
                $colaboradores  = mysqli_query($con, $sql);

                foreach($colaboradores AS $colaborador):
                  $idColaborador = $colaborador['id'];
              ?>
              <form action="back_tela_cadastro_pontos.php" method="POST">
                <tr>
                  <td><?php echo $colaborador['cpf'];?></td>
                  <td><?php echo $colaborador['nome'];?></td>
                  <?php if ($colaborador['tipo'] == 2){ ?>
                    <td><?php echo "Líder"; ?></td>
                  <?php }else if($colaborador['tipo'] == 3) { ?>
                    <td><?php echo "Usuário comum"; ?></td>
                  <?php } ?>
                  <td><input type="number" class="form-control" id="valor" name="valor" aria-describedby="Valor" placeholder="Digite o valor" required></td>  
                  <td><input type="number" class="form-control" id="quantidade" name="quantidade" aria-describedby="Quantidade" placeholder="Digite a quantidade" required></td>
                  <td><input type="hidden" class="form-control" id="idColaborador" name="idColaborador" value="<?php echo $idColaborador ?>"></td>  
                  <td><button type="submit" class="btn btn-success botao" name="editar">Enviar</button></td>
                </tr>
              </form>
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

