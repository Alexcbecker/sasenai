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

    $q = "SELECT * FROM colaboradores ORDER BY pontos DESC, creditos DESC";

    $result = $conn->query($q);

    $data = [];

    if ($result->num_rows > 0)
    {
        $rowa = [];

        while ($row = $result->fetch_assoc())
        {
            $rowa['name'] = $row['nome'];
            $rowa['points'] = $row['pontos'];
            $rowa['credit'] = $row['creditos'];

            array_push($data, $rowa);
        }
    }

    echo json_encode($data);
}
else die;

?>
