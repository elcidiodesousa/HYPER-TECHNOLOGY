<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="HyperLogo.png" type="image/x-icon">
    <title>Sistema De Gestao Onnline</title>
<link rel="shortcut icon" href="HyperLogo.png" type="image/x-icon">
   
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
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
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Produto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="form-group">
            <label class="form-label" for="codigo">Código do Produto:</label>
            <input class="form-input" type="text" id="codigo" name="codigo" placeholder="Informe o código do produto" required>
        </div>
        <input class="form-submit" type="submit" value="Buscar">
    </form>

    <?php
    // Verifica se o código do produto foi fornecido via método GET
    if(isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        
        $user = 'root';
        $password = 'elcidiosousa84'; 
        $database = 'bd_hyperTecnnology'; 
        $port = 33068; 
        $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

        // Verifica se a conexão foi estabelecida corretamente
        if ($mysqli->connect_error) {
            die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Consulta para obter os detalhes do produto com o código fornecido
        $query = "SELECT * FROM produtos WHERE codigo = '$codigo'";
        $result = $mysqli->query($query);

        // Verifica se o produto foi encontrado com o código fornecido
        if ($result->num_rows > 0) {
            // Extraindo os dados do produto
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
            $marca = $row['marca'];
            $modelo = $row['modelo'];
            $obs = $row['observacao'];
            $valorCompra = $row['valor_compra'];
            $valorVenda = $row['valor_venda'];
            $iva = $row['iva'];
            $volume = $row['volume'];

            // Exibe o formulário preenchido com os detalhes do produto
            ?>

            <h2>Detalhes do Produto</h2>
            <form action="edit.php" method="post">
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                <div class="form-group">
                    <label class="form-label" for="nome">Nome:</label>
                    <input class="form-input" type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="marca">Marca:</label>
                    <input class="form-input" type="text" id="marca" name="marca" value="<?php echo $marca; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modelo">Modelo:</label>
                    <input class="form-input" type="text" id="modelo" name="modelo" value="<?php echo $modelo; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="obs">Observações:</label>
                    <input class="form-input" type="text" id="obs" name="obs" value="<?php echo $obs; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="valorCompra">Valor de Compra:</label>
                    <input class="form-input" type="text" id="valorCompra" name="valorCompra" value="<?php echo $valorCompra; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="valorVenda">Valor de Venda:</label>
                    <input class="form-input" type="text" id="valorVenda" name="valorVenda" value="<?php echo $valorVenda; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="iva">IVA:</label>
                    <input class="form-input" type="text" id="iva" name="iva" value="<?php echo $iva; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="volume">Volume:</label>
                    <input class="form-input" type="text" id="volume" name="volume" value="<?php echo $volume; ?>" required>
                </div>
                <input class="form-submit" type="submit" name="submit" value="Atualizar">
            </form>

            <?php
        } else {
            echo "Produto não encontrado.";
        }

       
    }
    ?>
</div>

</body>
</html>
