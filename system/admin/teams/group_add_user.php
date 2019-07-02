<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bd_fito";

session_start();

if ($_SESSION['id_sessao']  != session_id()) die;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
mysqli_set_charset($conn, "utf8");

$u_id = $_POST['user_id'];
$g_id = $_POST['group_id'];

$q = "SELECT id FROM colaboradores_has_grupos WHERE colaboradores_id = {$u_id} AND grupos_id = {$g_id}";

$result = $conn->query($q);

// only if the user is inactive. and not part of other group
if ($row = $result->fetch_assoc())
{
    $q = "UPDATE colaboradores_has_grupos SET status = 0 WHERE id = {$row['id']}";
    $conn->query($q);
}
else 
{
    $q = "INSERT INTO colaboradores_has_grupos (colaboradores_id, grupos_id, status) VALUES ({$u_id}, {$g_id}, 0)";
    $conn->query($q);
}

echo "status:ok";

?>
