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
            color: #4CAF50;
            background-color: #e7f4e7;
            border: 1px solid #4CAF50;
            padding: 10px;
            margin-bottom: 10px;
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
if(isset($_POST['confirmar'])){
    include_once('conectar.php'); 

    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $bonus = mysqli_real_escape_string($mysqli, $_POST['bonus']);
    $metodo = mysqli_real_escape_string($mysqli, $_POST['metodo']);
    $conta = mysqli_real_escape_string($mysqli, $_POST['conta']);
    $salario = mysqli_real_escape_string($mysqli, $_POST['salario']);


    if (empty($nome) ||  empty($metodo) || empty($conta) || empty($salario)) {
        echo '<div class="failure">Por favor, preencha todos os campos.</div>';
    } else {
        $check_email = mysqli_query($mysqli, "SELECT * FROM salarios WHERE nome = '$nome'");
        if(mysqli_num_rows($check_email) > 0){
            echo '<div class="failure">Este funcionario já foi pago.</div>';
        } else{
        $cadastro_cliente = mysqli_query($mysqli, "INSERT INTO salarios (nome, bonus, metodo, conta, salario)
        VALUES ('$nome', '$bonus', '$metodo', '$conta', '$salario')");

        if($cadastro_cliente) {
            echo '<div class="success">Pagamento feito com sucesso!</div>';
        } else {
            echo '<div class="failure">Falha ao realizar pagamento.</div>';
        }
    }
}}
?>

</body>
</html>

