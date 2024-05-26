<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_destinatario = $_POST["email_destinatario"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hypertecnology303@gmail.com';
        $mail->Password = 'q i y z c r s b i q l h q o q e'; 
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
