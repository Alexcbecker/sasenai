
    <?php
    $con = mysqli_connect("localhost","root","root","bd_fito");
    if(!$con){
        die("Erro no banco de dados");
    }
    $id = $_POST["id"];
    $sql_sel =  "SELECT * FROM `campanhas` WHERE id='$id'";
    $result  = mysqli_query($con, $sql_sel);
    if (!$result) die ("Erro.");
    $campanha_selecionada = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "q";
?>
