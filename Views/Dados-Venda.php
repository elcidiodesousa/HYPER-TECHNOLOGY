<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venda</title>
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
if(isset($_POST['submit'])){ 
    include_once('conectar.php'); 

    $cliente = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $produto = mysqli_real_escape_string($mysqli, $_POST['produto']);
    $quantidade = mysqli_real_escape_string($mysqli, $_POST['quantidade']);
    $valor_unitario = mysqli_real_escape_string($mysqli, $_POST['unitario']);
    $desconto = mysqli_real_escape_string($mysqli, $_POST['lucro']);
    $marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
    $tipo_pagamento = mysqli_real_escape_string($mysqli, $_POST['tipo']);
    $modelo = mysqli_real_escape_string($mysqli, $_POST['modelo']);
    $observacao = mysqli_real_escape_string($mysqli, $_POST['observacao']);
    $total = mysqli_real_escape_string($mysqli, $_POST['total']);
    $vendedor = mysqli_real_escape_string($mysqli, $_POST['vendedor']);


    if (empty($cliente) || empty($produto) || empty($quantidade) || empty($valor_unitario) || empty($desconto) || empty($marca) || empty($tipo_pagamento) || empty($modelo) || empty($observacao) || empty($vendedor)) {
        echo '<div class="failure"> Por favoor, Preencha Todos Campos! <br><br>  <button type="button" style="width: 40%;
        height: 8vh; border-radius: 5px;
        background-color: orange; text-align: center; margin-left: 30%;
        border: none;font-Size: 18px;"><a  href="vendass.php" style="text-decoration: none;">Voltar</a></button></div>';
    } else {
        $registro_venda = mysqli_query($mysqli, "INSERT INTO vendas (cliente, produto, quantidade, valor_unitario, desconto, marca, tipo_pagamento, modelo, observacao, total, vendedor)
        VALUES ('$cliente', '$produto', '$quantidade', '$valor_unitario', '$desconto', '$marca', '$tipo_pagamento', '$modelo', '$observacao', '$total', '$vendedor')");

        if($registro_venda) {
            echo '<div class="success"> Venda Registrada Com Sucesso! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendass.php" style="text-decoration: none;">Voltar</a></button></div>';
        } else {
            echo '<div class="failure"> Falha Ao Registrar Venda! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendass.php" style="text-decoration: none;">Voltar</a></button></div>';
        }
    }
}
?>

</body>
</html>
