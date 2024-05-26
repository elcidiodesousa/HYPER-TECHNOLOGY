<!DOCTYPE html>
<html>

<head>
  <title>DADOS CADASTRAIS</title>
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
      position: absolute;
      top: 70%;
      color: #f44336;
      background-color: #fce7e7;
      border: 1px solid #f44336;
      padding: 10px;
    }
  </style>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários estão definidos
    if (isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['obs']) && isset($_POST['valorCompra']) && isset($_POST['valorVenda']) && isset($_POST['iva']) && isset($_POST['volume'])) {
        
        // Recupera os dados do formulário
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $obs = $_POST['obs'];
        $valorCompra = $_POST['valorCompra'];
        $valorVenda = $_POST['valorVenda'];
        $iva = $_POST['iva'];
        $volume = $_POST['volume'];

        // Conexão com o banco de dados
        $user = 'root';
        $password = 'elcidiosousa84'; 
        $database = 'bd_hyperTecnnology'; 
        $port = 33068; 
        $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

        // Verifica se a conexão foi estabelecida corretamente
        if ($mysqli->connect_error) {
            die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Query para atualizar os dados do produto
        $query = "UPDATE produtos SET nome='$nome', marca='$marca', modelo='$modelo', observacao='$obs', valor_compra='$valorCompra', valor_venda='$valorVenda', iva='$iva', volume='$volume' WHERE codigo='$codigo'";

        // Executa a query
        if ($mysqli->query($query) === TRUE) {
            echo '<div class="success"> Dados do produto atualizados com sucesso! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        } else {
            echo "Erro ao atualizar dados do produto: " . $mysqli->error;
        }

        // Fecha a conexão com o banco de dados
        $mysqli->close();
    } else {
        echo '<div class="failure"> Todos Campos Devem Ser Preenchidos! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
    }
} else {
    echo "Método não permitido!";
}
?>

</body>
</html>