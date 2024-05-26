<!DOCTYPE html>
<html>

<head>
  <title>DADOS CADASTRAIS</title>
  <style>
        body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 650px;
      margin: 20px auto;
      margin-top: 7%;
      padding: 10px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 5px;
      color: #333;
    }

    form {
      margin-bottom: 0;
      padding-left: 17px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 3px;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    select {
      width: calc(100% - 22px);
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    select {
      appearance: none;
      background: url('data:image/svg+xml;utf8,<svg fill="gray" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>') no-repeat right 8px center/14px 14px;
      padding-right: 30px;
    }

    .btn-guardar-cliente {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-transform: uppercase;
      width: calc(100% - 22px);
    }

    .btn-guardar-cliente:hover {
      background-color: #45a049;
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
      position: absolute;
      top: 70%;
      color: #4CAF50;
      background-color: #e7f4e7;
      border: 1px solid #4CAF50;
      padding: 10px;
      
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
  <div class="container">
    <h2>DADOS CADASTRAIS</h2>
    <form action="NovoLogin.php" method="post">
      <label for="nome-prod">Nome:</label>
      <input type="text" name="nome" id="nome-prod">

      <label for="email-prod">Email:</label>
      <input type="email" name="email" id="email-prod">

      <label for="data-prod">Usuario:</label>
      <input type="text" name="usuario" id="data-prod">


      <label for="nuit-prod">senha:</label>
      <input type="text" name="senha" id="nuit-prod">


      <label for="opcoes">Status:</label>
      <select id="opcoes" name="status">
      <option value="administrador">Administrador</option>
      <option value="vendedor">Vendedor</option>
      </select>

      <button type="submit" name="submit" class="btn-guardar-cliente">CADASTRAR</button>
    </form>
  </div>

  <?php
if(isset($_POST['submit'])){
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
            echo '<div class="success">Usuario cadastrado com sucesso!</div>';
        } else {
            echo '<div class="failure">Falha ao cadastrar o usuario.</div>';
        }
    }
}}
?>

</body>

</html>
