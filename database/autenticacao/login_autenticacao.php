<?php


$cpf  = $_POST["cpf"];
$senha    = $_POST["senha"];
$mensagem = "";
$status   = "danger";
$link     = "../../index.php";

if ($cpf == "") $mensagem = "CPF não preenchido.";
else if ($senha == "") $mensagem = "Senha não preenchida.";
else
{
  include "../conexao_bd.php";
  include "../funcoes_base_crud.php";
  $buscaUsuario = mysql_select("SELECT * FROM colaboradores WHERE cpf=".$cpf." AND senha='".$senha."'");

  if ($buscaUsuario[0]['cpf'] == $cpf) 
  {
      if (!empty($buscaUsuario))
      {
        if ($buscaUsuario[0]['status']==1) $mensagem = "Usuário desativado.";
        else 
        {
          if ($buscaUsuario[0]['tipo']==1)
          {
            session_start();
            $_SESSION['id_sessao']  = session_id();
            $_SESSION['id']         = $buscaUsuario[0]['id'];
            
            $_SESSION['nome']       = $buscaUsuario[0]['nome'];
            $_SESSION['email']      = $buscaUsuario[0]['email'];
            $_SESSION['cpf']        = $buscaUsuario[0]['cpf'];
            $_SESSION['tipo']       = $buscaUsuario[0]['tipo'];
            $_SESSION['sexo']       = $buscaUsuario[0]['sexo'];

            header("Location: ../../system/admin/navbar.html");
          }
          else if ($buscaUsuario[0]['tipo']==2)
          {
            session_start();
            $_SESSION['id_sessao']  = session_id();
            $_SESSION['id']         = $buscaUsuario[0]['id'];
            $_SESSION['nome']       = $buscaUsuario[0]['nome'];
            $_SESSION['email']      = $buscaUsuario[0]['email'];
            $_SESSION['senha']      = $buscaUsuario[0]['senha'];
            $_SESSION['cpf']        = $buscaUsuario[0]['cpf'];
            $_SESSION['tipo']       = $buscaUsuario[0]['tipo'];
            $_SESSION['sexo']       = $buscaUsuario[0]['sexo'];
            $_SESSION['pontos']     = $buscaUsuario[0]['pontos'];
            $_SESSION['creditos']   = $buscaUsuario[0]['creditos'];
            $_SESSION['grupos_id']  = $buscaUsuario[0]['grupos_id'];
            $_SESSION['status']     = $buscaUsuario[0]['status'];


            header("Location: ../../system/user/navbar_lider.html");
          }
          else if ($buscaUsuario[0]['tipo']==3)
          {
            session_start();
            $_SESSION['id_sessao']  = session_id();
            $_SESSION['id']         = $buscaUsuario[0]['id'];
            $_SESSION['nome']       = $buscaUsuario[0]['nome'];
            $_SESSION['email']      = $buscaUsuario[0]['email'];
            $_SESSION['senha']      = $buscaUsuario[0]['senha'];
            $_SESSION['cpf']        = $buscaUsuario[0]['cpf'];
            $_SESSION['tipo']       = $buscaUsuario[0]['tipo'];
            $_SESSION['sexo']       = $buscaUsuario[0]['sexo'];
            $_SESSION['pontos']     = $buscaUsuario[0]['pontos'];
            $_SESSION['creditos']   = $buscaUsuario[0]['creditos'];
            $_SESSION['grupos_id']  = $buscaUsuario[0]['grupos_id'];
            $_SESSION['status']     = $buscaUsuario[0]['status'];

            header("Location: ../../system/user/navbar_usuario.html");
          }
          else
          {
            $mensagem = "usuario ou senha incorretos.";
            header("Location: ".$link."?mensagem=".$mensagem."&status=".$status);
          }
        }
      }

  }
  else
  {
    $mensagem = "CPF ou senha incorreto.";
    header("Location: ".$link."?mensagem=".$mensagem."&status=".$status);
  }
}

?>
