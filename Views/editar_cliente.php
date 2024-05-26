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
    <h2>Editar Cliente</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="form-group">
            <label class="form-label" for="codigo">Código do Cliente:</label>
            <input class="form-input" type="text" id="nome" name="nome" placeholder="Informe o código do produto" required>
        </div>
        <input class="form-submit" type="submit" value="Buscar">
    </form>

    <?php
    // Verifica se o código do produto foi fornecido via método GET
    if(isset($_GET['nome'])) {
        $nome = $_GET['nome'];
        
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
        $query = "SELECT * FROM clientes WHERE nome = '$nome'";
        $result = $mysqli->query($query);

        // Verifica se o produto foi encontrado com o código fornecido
        if ($result->num_rows > 0) {
            // Extraindo os dados do produto
            $row = $result->fetch_assoc();
            $data = $row['data'];
            $email = $row['email'];
            $nuit = $row['nuit'];
            $contacto = $row['contacto'];
            $tipo = $row['tipo'];
            $cidade = $row['cidade'];
            $bairro = $row['bairro'];

            // Exibe o formulário preenchido com os detalhes do produto
            ?>

            <h2>Dados do Clientes</h2>
            <form action="edit_cli.php" method="post">
                <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                <div class="form-group">
                    <label class="form-label" for="nome">Data:</label>
                    <input class="form-input" type="text" id="data" name="data" value="<?php echo $data; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="marca">Email:</label>
                    <input class="form-input" type="text" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modelo">Nuit:</label>
                    <input class="form-input" type="text" id="nuit" name="nuit" value="<?php echo $nuit; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="obs">Contacto:</label>
                    <input class="form-input" type="text" id="contacto" name="contacto" value="<?php echo $contacto; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="valorCompra">Status:</label>
                    <input class="form-input" type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="valorVenda">Cidade:</label>
                    <input class="form-input" type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="iva">Bairro:</label>
                    <input class="form-input" type="text" id="bairro" name="bairro" value="<?php echo $bairro; ?>" required>
                </div>
                <input class="form-submit" type="submit" name="submit" value="Atualizar">
            </form>

            <?php
        } else {
            echo "Cliente não encontrado.";
        }

       
    }
    ?>
</div>

</body>
</html>
