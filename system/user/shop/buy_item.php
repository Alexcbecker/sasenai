<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  == session_id())
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    mysqli_set_charset($conn, "utf8");

    $result = $conn->query("SELECT valor, quantidade FROM itens WHERE tipo=2 AND nome='{$_POST['name']}'");

    $error = 'error';

    echo $conn->error;

    if ($row = $result->fetch_assoc())
    {
        if ($row['quantidade'] > 0)
        {
            $r = $conn->query("SELECT creditos FROM colaboradores WHERE cpf='{$_SESSION['cpf']}'");

            if ($rowa = $r->fetch_assoc())
            {
                if ($rowa['creditos'] >= $row['valor'])
                {
                    $value = $rowa['creditos'] - $row['valor'];
                    $qnd = $row['quantidade'] - 1;
                    $conn->query("UPDATE colaboradores SET creditos='{$value}' WHERE cpf='{$_SESSION['cpf']}'");
                    $conn->query("UPDATE itens SET quantidade='{$qnd}' WHERE nome='{$_POST['name']}'");

                    $error = 'ok';
                    $_SESSION['creditos'] = $value;
                }
                else $error = 'invalid_value';
            }
        }
        else $error = 'empty';
    }

    echo $error;
}

?>