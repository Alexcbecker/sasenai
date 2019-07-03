<?php
include '../../base_db.php';

$status = "error";

$cpf = $_POST['cpf'];

$q = "SELECT cpf FROM colaboradores WHERE cpf={$cpf}";
$r = $conn->query($q);

if ($r->num_rows == 0)
{
    $sx = $_POST['sex'] == 'Masculino' ? 1 : 2;
    $ty = $_POST['usertype'] == 'Administrador' ? '1' : ($_POST['usertype'] == 'Líder' ? '2' : '3');

    $q = "INSERT INTO colaboradores (id, email, senha, cpf, nome, tipo, sexo, status, pontos, creditos) VALUES (null, '{$_POST['email']}', '{$_POST['password']}', '{$cpf}', '{$_POST['name']}', {$ty}, {$sx}, 0, 0, 0)";

    if ($conn->query($q) === TRUE)
    {
        $q = "SELECT id FROM colaboradores WHERE cpf={$cpf}";
        $r = $conn->query($q);

        if ($r->num_rows == 1)
        {
            if ($row = $r->fetch_assoc())
            {
                $q = "INSERT INTO avatares (id, colaboradores_id) VALUES (null, {$row['id']})";

                if ($conn->query($q) === TRUE)
                {
                    $q = "SELECT id FROM avatares WHERE colaboradores_id={$row['id']}";
                    $r = $conn->query($q);

                    if ($r->num_rows == 1)
                    {
                        if ($row = $r->fetch_assoc())
                        {
                            $q = "INSERT INTO avatares_has_itens (avatares_id, itens_id, status) VALUES ({$row['id']}, 2, 1)";

                            if ($conn->query($q) === TRUE) $status = "ok";
                        }
                    }
                    }
            }
        }
    }
}
else $status = "cpfinvalid";

echo "status:{$status}";
?>
