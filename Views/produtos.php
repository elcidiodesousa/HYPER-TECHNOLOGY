<!DOCTYPE html>
<html>
<head>
    <title>Registro de produtos</title>
    <link rel="shortcut icon" href="HyperLogo.png" type="image/x-icon">
   
    <style>

        body{
            background-color: while;
        }
        .form-container {
            width: 80%;
            height: 75vh;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5%;
        }
        h2{
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-input {
            width: 30%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        
        .form-submit {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 50px;
        }
        
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
</head>
<body>

<?php
if(isset($_POST['submit'])){ 
    include_once('conectar.php'); 

    $codigo = mysqli_real_escape_string($mysqli, $_POST['codigo-prod']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome-prod']);
    $marca = mysqli_real_escape_string($mysqli, $_POST['marca-prod']);
    $modelo = mysqli_real_escape_string($mysqli, $_POST['modelo-prod']);
    $obs = mysqli_real_escape_string($mysqli, $_POST['obs-prod']);
    $valorCompra = mysqli_real_escape_string($mysqli, $_POST['valorCompra-prod']);
    $valorVenda = mysqli_real_escape_string($mysqli, $_POST['valorVenda-prod']);
    $lucro = mysqli_real_escape_string($mysqli, $_POST['lucro-prod']);
    $iva = mysqli_real_escape_string($mysqli, $_POST['iva-prod']);
    $volume = mysqli_real_escape_string($mysqli, $_POST['volume-prod']);

    if (empty($codigo) || empty($nome) || empty($marca) || empty($modelo) || empty($valorCompra) || empty($valorVenda) || empty($lucro) || empty($iva) || empty($volume)) {
        echo '<div class="failure">Por favor, preencha todos os campos.</div>';
    } else {
        $check_email = mysqli_query($mysqli, "SELECT * FROM produtos WHERE codigo = '$codigo'");
        if(mysqli_num_rows($check_email) > 0){
            echo '<div class="failure">Este codigo já está cadastrado.</div>';
        } else {
            $clientes = mysqli_query($mysqli, "INSERT INTO produtos (codigo, nome, marca, modelo, observacao, valor_compra, valor_venda, lucro, iva, volume)
            VALUES ('$codigo', '$nome', '$marca', '$modelo', '$obs', '$valorCompra', '$valorVenda', '$lucro', '$iva', '$volume')");

            if($clientes) {
                echo '<div class="success">Cadastrado com sucesso!</div>';
            } else {
                echo '<div class="failure">Falha ao cadastrar.</div>';
            }
        }
    }
}
?>

<script>
        function gerarCodigo() {
            var num1 = Math.floor(Math.random() * 9) + 0;
            var num2 = Math.floor(Math.random() * 9) + 0;
            var num3 = Math.floor(Math.random() * 9) + 0;
            var codigo = num1.toString() + num2.toString() + num3.toString();
            document.getElementById("codigo-prod").value = codigo;
        }
    </script>
    <script>
        function calcularLucro() {
            var valorCompra = parseFloat(document.getElementById("valorCompra-prod").value);
            var valorVenda = parseFloat(document.getElementById("valorVenda-prod").value);

            if (!isNaN(valorCompra) && !isNaN(valorVenda)) {
                var lucro = valorVenda - valorCompra;
                document.getElementById("lucro-prod").value = lucro.toFixed(2);
            } else {
                document.getElementById("lucro-prod").value = "";
            }
        }
    </script>
</body>
</html>
