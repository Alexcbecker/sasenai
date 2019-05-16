<?php
function mysql_insert($insert){
//retorno devem ser quantas linhas foram afetadas
    global $con;
    $dados = mysqli_query($con,$insert) ;

    $inseriu = mysqli_affected_rows($con);

    mysqli_close($con);
    return $inseriu;
}

function mysql_select($select){
//retorno deve ser um array
    global $con;
    $dados = mysqli_query($con,$select) ;

    $selecionou = mysqli_affected_rows($con);
    $arrestudante = array();
    while($linha = mysqli_fetch_array($dados,MYSQLI_ASSOC)){
        array_push($arrestudante,$linha);
    }
    mysqli_close($con);
    return $arrestudante;
}


function mysql_update($update){
//retorno devem ser quantas linhas foram afetadas
    global $con;
    $dados = mysqli_query($con,$update) or die(mysqli_error());

    $atualizou = mysqli_affected_rows($con);

    mysqli_close($con);
    return $atualizou;
}


function mysql_delete($delete){

    global $con;
        $dados = mysqli_query($con,$script) or die(mysqli_error());

    $deletou = mysqli_affected_rows($con);

    mysqli_close($con);
    return $deletou;
}
?>
