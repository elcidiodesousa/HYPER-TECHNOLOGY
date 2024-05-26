<?php
include_once('conectar.php');

if(isset($_GET['modelo']) && isset($_GET['observacao'])) {
    $modelo = $_GET['modelo'];
    $observacao = $_GET['observacao'];

    $query = "SELECT valor_venda FROM produtos WHERE modelo = '$modelo' AND observacao = '$observacao'";
    $resultado = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        echo $row['valor_venda']; 
    } else {
        echo "ESGOTADO";
    }
}
?>
