<?php
include_once('conectar.php');

if(isset($_GET['modelo'])) {
    $modelo = $_GET['modelo'];

    $query = "SELECT codigo FROM produtos WHERE modelo = '$modelo'";
    $resultado = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        echo $row['codigo'];
    } else {
        echo "Código não encontrado";
    }
}

?>
