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
    if (isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['email']) && isset($_POST['nuit']) && isset($_POST['contacto']) && isset($_POST['tipo']) && isset($_POST['cidade']) && isset($_POST['bairro'])) {
      
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $email = $_POST['email'];
        $nuit = $_POST['nuit'];
        $contacto = $_POST['contacto'];
        $tipo = $_POST['tipo'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];

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
        $query = "UPDATE clientes SET data='$data', email='$email', nuit='$nuit', contacto='$contacto', tipo='$tipo', cidade='$cidade', bairro='$bairro' WHERE nome='$nome'";

        // Executa a query
        if ($mysqli->query($query) === TRUE) {
            echo '<div class="success">Dados do cliente atualizados com sucesso! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        } else {
            echo "Erro ao atualizar dados do cliente: " . $mysqli->error;
        }
        // Fecha a conexão com o banco de dados
        $mysqli->close();
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
} else {
    echo "Método não permitido!";
}
?>

</body>
</html>