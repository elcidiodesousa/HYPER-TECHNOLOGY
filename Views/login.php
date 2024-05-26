<?php

session_start(); 

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    include_once('conectar.php');

    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $verificar = $mysqli->query($sql);

    if ($verificar && mysqli_num_rows($verificar) == 1) {
        $usuario_info = $verificar->fetch_assoc();

        $_SESSION['usuario'] = $usuario_info['usuario']; // Salva o nome do usuário na sessão
        $_SESSION['senha'] = $senha;

        // Verifica o status do usuário
        $status = $usuario_info['status'];

        if ($status == 'administrador') {
            $_SESSION['tipo_usuario'] = 'administrador';
            header('Location: vendass.php');
        } elseif ($status == 'vendedor') {
            $_SESSION['tipo_usuario'] = 'vendedor';
            header('Location: vendas.php');
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.html?erro=status_invalido');
        }
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: index.html?erro=credenciais_invalidas');
    }
} else {
    header('Location: index.html');
}

?>
