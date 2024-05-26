<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
      /* Animação */
      @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(50%);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animated {
            animation: slideIn 0.5s ease-in-out;
        }
        
        .success {
      position: absolute;
      top: 40%;
      left:40%;
      color: #4CAF50;
      background-color: #e7f4e7;
      border: 1px solid #4CAF50;
      padding: 10px;
      
    }

    .sucess a{
        width: 20%;
        height: 5vh;
        background-color: orange;
        border: none;


    }
        .failure {
            color: #f44336;
            background-color: #fce7e7;
            border: 1px solid #f44336;
            padding: 10px;
            margin-bottom: 10px;
        }
</style>
<body>
<?php
if(isset($_POST['submit'])){ // se houve um clique no botão submit
    include_once('conectar.php'); 

    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);


    if (empty($nome) || empty($email) || empty($usuario) || empty($senha) || empty($status)) {
        echo '<div class="failure">Por favor, preencha todos os campos.</div>';
    } else {
        $check_email = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE nome = '$nome'");
        if(mysqli_num_rows($check_email) > 0){
            echo '<div class="failure">Este usuario já está cadastrado.</div>';
        } else{
        $cadastro_cliente = mysqli_query($mysqli, "INSERT INTO usuarios (nome, email, usuario, senha, status)
        VALUES ('$nome', '$email', '$usuario', '$senha', '$status')");

        if($cadastro_cliente) {
            echo '<div class="success"> Usuario cadastrado com sucesso! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        } else {
            echo '<div class="failure"> Falha Ao Cadastrar Usuario! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        }
    }
}}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_destinatario = $_POST["email"];
    $assunto = $_POST["nome"];
    $mensagem_usuario = $_POST["senha"];
    $usuario = $_POST["usuario"];

    $texto_adicional = $assunto.", suas credenciais para o acesso ao HYPER TECNOLOGY.";

    $mensagem = $texto_adicional. " \n\n"."USER:  " .$usuario. "\n". "PASSWORD: " .$mensagem_usuario. "\n\n\n". "USE SEMPRE ESSAS CREDENCIAIS PARA LOGAR NO SISTEMA.";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'hypertecnology303@gmail.com'; 
        $mail->Password = 'q i y z c r s b i q l h q o q e'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('hypertecnology303@gmail.com', 'Hyper Tecnology'); 

        $mail->addAddress($email_destinatario);

        $mail->Subject = $assunto;
        $mail->Body = $mensagem;

        $mail->send();
        echo "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>

</body>
</html>

