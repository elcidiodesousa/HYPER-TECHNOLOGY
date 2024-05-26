<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = 'root';
    $password = 'elcidiosousa84'; 
    $database = 'bd_hyperTecnnology'; 
    $port = 33068; 
    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }

    $id = $_POST['nome'];
    $sql = "DELETE FROM clientes WHERE nome = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        echo "Registro eliminado com sucesso.";
    } else {
        echo "Erro ao eliminar registro: " . $stmt->error;
    }


}
?>
