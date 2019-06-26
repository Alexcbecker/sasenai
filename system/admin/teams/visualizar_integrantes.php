<?php
include "../../../database/conexao_bd.php";

$id_grupo = $_POST['id'];

$sql = "SELECT colaboradores.nome AS 'colaboradornome', colaboradores.tipo AS 'colaboradortipo', grupos.nome AS 'gruponome', grupos.id AS 'grupoid'
      FROM grupos
      INNER JOIN colaboradores_has_grupos
      ON colaboradores_has_grupos.grupos_id = grupos.id
      INNER JOIN colaboradores
      ON colaboradores_has_grupos.colaboradores_id=colaboradores.id
      WHERE grupos.id = $id_grupo";

$result = mysqli_query($con, $sql);

$dados = mysqli_fetch_all($result);

$dados_json = json_encode($dados);

echo $dados_json;
 ?>
