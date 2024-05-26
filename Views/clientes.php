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
if(isset($_POST['submit'])){ // se houve um clique no botão submit
    include_once('conectar.php'); // acesso ao banco de dados

    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $data = mysqli_real_escape_string($mysqli, $_POST['data']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $nuit = mysqli_real_escape_string($mysqli, $_POST['nuit']);
    $contacto = mysqli_real_escape_string($mysqli, $_POST['contacto']);
    $tipo = mysqli_real_escape_string($mysqli, $_POST['tipo']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);

    // Verificar se todos os campos estão preenchidos
    if (empty($nome) || empty($data) || empty($email) || empty($nuit) || empty($contacto) || empty($tipo) || empty($cidade) || empty($bairro)) {
        echo '<div class="failure">Por favor, preencha todos os campos.</div>';
    } else {
        $check_email = mysqli_query($mysqli, "SELECT * FROM clientes WHERE nome = '$nome'");
        if(mysqli_num_rows($check_email) > 0){
            echo '<div class="failure">Este cliente já está cadastrado.</div>';
        } else{
        // Realizar o cadastro
        $cadastro_cliente = mysqli_query($mysqli, "INSERT INTO clientes (nome, data, email, nuit, contacto, tipo, cidade, bairro)
        VALUES ('$nome', '$data', '$email', '$nuit', '$contacto', '$tipo', '$cidade', '$bairro')");

        if($cadastro_cliente) {
            echo '<div class="sucess"> Cliente Cadastrado com Sucesso! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        } else {
            echo '<div class="failure">Falha ao cadastrar o cliente! <br><br>  <button type="button" style="width: 40%;
            height: 8vh; border-radius: 5px;
            background-color: orange; text-align: center; margin-left: 30%;
            border: none;font-Size: 18px;"><a  href="vendas.php" style="text-decoration: none;">Voltar</a></button></div>';
        }
    }
}}
?>

