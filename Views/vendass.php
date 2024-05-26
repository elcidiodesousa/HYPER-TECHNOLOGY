<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit;
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' rel="stylesheet">
<title>Sistema De Gestao Onnline</title>
<link rel="shortcut icon" href="HyperLogo.png" type="image/x-icon">
</head>

<style>

.div-altura-total{
    background: url('tela.png');
  }

  .aba-cliente{
  position: relative;
  top: -44%;
  left: 0%;
  background: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 99%;
  height: 16vh;
  z-index: 1000;
  border-radius: 5px;
}

.help_clie{
  position: relative;
  top: -50%;
  left: 60%;
}

.clie{
  position: relative;
  top: -45%;
  left: 5%;
  font-size: 16px;
}

.content{
  position: absolute;
  top: 0%;
  width: 98%;
  height: 65vh;
}

.eliminar form{
  position: absolute;
  top: 60px;
  width: 50%;
}

.input-id{
  width: 30%;
  height: 4vh;
}

.btn-eliminar{
  width: 20%;
  height: 5vh;
  background-color: rgb(247, 33, 33);
}

.btn-guardar-usuario{
  position: relative;
  width: 30%;
  height: 7vh;
  left: 20%;
  color: white;
  background-color: rgb(19, 212, 19);
  border: none;
  border-radius: 5px;
  text-align: center;
}

.btn-guardar-usuario:hover{
  position: relative;
  width: 32%;
  height: 8vh;
  color: white;
}

.aba-prod{
    position: relative;
    top: -45%;
    left: 0%;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 99%;
    height: 16vh;
    z-index: 1000;
    border-radius: 5px;
  }

  .help{
  position: relative;
  top: -50%;
  left: 60%;
}

.pro{
  position: relative;
  top: -45%;
  left: 5%;
  font-size: 16px;
}

.aba{
    position: relative;
    top: -20%;
    left: 0%;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 99%;
    height: 35vh;
    z-index: 1000;
    border-radius: 5px;
  }

.form-container button{
    position: absolute;
    top: 290px;
    width: 15%;
    left: 10px;
    height: 7vh;
    background: rgb(18, 18, 121);
    color: white;
    border-radius: 7px;
    border: none;
  }

  .form-container button:hover{
    width: 15.5%;
    height: 7.5vh;
  }

  hr{
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 50px; 
    border-top: 1px solid black;
  }

  .content{
  position: absolute;
  top: 0%;
  width: 98%;
  height: 65vh;
}

.estq{
  position: relative;
  top: -93%;
  left: 5%;
  font-size: 16px;
}

.help-estoque{
  position: relative;
  top: -97%;
  left: 60%;
}

.info{
  position: relative;
  top: -95%;
  left: 3%;
  background-color: rgb(10, 10, 73);
  color: white;
  width: 10%;
  height: 6vh;
  text-align: center;
  border: none;
   border-radius: 5px;
}

.vendas-hoje{
  position: relative;
  top: -55%;
  background-color: rgb(0, 238, 226);
  color: white;
  width: 108%;
  height: 25vh;
  border: none;
  border-radius: 7px;
}

.vendas-total{
  position: relative;
  top: -97%;
  left: 120%;
  background-color: rgb(84, 248, 84);
  color: white;
  width: 110%;
  height: 25vh;
  border: none;
  border-radius: 7px;
}

.vendas-pagar{
  position: relative;
  top: -139%;
  left: 240%;
  background-color: rgb(236, 22, 22);
  color: white;
  width: 108%;
  height: 25vh;
  border: none;
  border-radius: 7px;
}

.pagamentos{
    position: relative;
    top: -130%;
    left: 119.5%;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 230%;
    height: 65.5vh;
    z-index: 1000;
    border-radius: 7px;
}

.content-finc{
  position: absolute;
  top: 0%;
  width: 80%;
  height: 65vh;
}

.content-ser{
  position: absolute;
  top: 10%;
  left:76%;
  width: 24%;
  height: 75vh;
}

.content-pag{
  position: absolute;
  top: -5%;
  left:0%;
  width: 100%;
  height: 95vh;
}


.vendas-pagar input{
  position: absolute;
  font-size: 30px;
  top: 25%;
  left: 5%;
  width: 70%;
  height: 5vh;
  background: transparent;
  border: none;
  color: white;
 }

 .vendas-total input{
  position: absolute;
  font-size: 30px;
  top: 25%;
  left: 10%;
  width: 40%;
  height: 5vh;
  background: transparent;
  text-align: center;
  border: none;
  color: white;
 }

 .form-container-servico {
    position: fixed;
    top: 52%;
    left: 23%;
    transform: translateY(-50%);
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 73%;
    height: 80vh;
    z-index: 1000;
    border-radius: 5px;
  }

  .hidden {
    display: none;
  }

  .content-serv{
  position: absolute;
  top: 10%;
  left: 0%;
  width: 20%;
  height: 70vh;
}

.content-est{
  position: absolute;
  top: 4%;
  left: 30%;
  width: 70%;
  height: 80vh;
}

.form-container-agenda {
    position: fixed;
    top: 52%;
    left: 23%;
    transform: translateY(-50%);
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 73%;
    height: 80vh;
    z-index: 1000;
    border-radius: 5px;
  }

  .hidden {
    display: none;
  }

  .help_pedido{
  position: relative;
  top: -45%;
  left: 60%;
}

.pedido{
  position: relative;
  top: -65%;
  left: 5%;
  font-size: 16px;
}

.search i{
    position: absolute;
    left: 22px;
    top: 22.5%;
    transform: translateY(50%);
    font-size: 20px;
}

.usu{
    position: absolute;
    left: 22px;
    top: 15%;
    font-size: 20px;
    background: transparent;
    color:White;
    border:none;
}

.homee{
        position: absolute;
        top: 10%;
        width: 50%; 
        left: 40%;
        text-align: center;
        height: 60vh; 
        display: flex;
        justify-content: center; 
        align-items: center; 
    }
</style>
<body>

<div class="div-altura-total">
  <img src="Logotipo.png" alt="Logotipo do site"> 
  <h2>GESTÃO ONLINE</h2>
  <hr> 

  <input type="text" class="usu" name="usu" id="usu"  value="<?php echo htmlspecialchars($usuario); ?>" readonly>

  <div class="out" style="position:absolute; left:96%; top:2%; background-color: red; width:3%; height:4vh; text-align: center; border-radius:10px; padding:5px;">
    <a href="index.html" style="text-decoration: none; margin-top:5%;">Sair</a>
  </div>

  <div class="search">
    <form action="">
        <input type="search" id="" placeholder="        Procurar opção do menu....">
        <i class='bx bx-search-alt-2' style='color:#ffffff;'  ></i>
    </form>
  </div>

  <div class="home">
    <button type="button" id="toggle-form-home"><strong>Home</strong></button>
    <i class='bx bxs-home' style='color:#ffffffc4'></i>
</div>


<div class="clientes">
    <button type="button" id="toggle-form-cliente"><strong>Pessoas</strong></button>
    <i class='bx bxs-user-detail' style='color:#ffffffc4'></i>
</div>

<div class="produto">
    <button type="button" id="toggle-form-prod"><strong>Produtos</strong></button>
    <i class='bx bxs-purchase-tag-alt' style='color:#ffffffc4'></i>
</div>

<div class="vendas">
    <button type="button" id="toggle-form-vendas"><strong>Vendas</strong></button>
    <i class='bx bxs-cart' style='color:#ffffffc4'></i>
</div>

<div class="estoque">
    <button type="button" id="toggle-form-estoque"><strong>Estoque</strong></button>
    <i class='bx bxs-objects-vertical-bottom' style='color:#ffffffc4'></i>
</div>

<div class="financas">
    <button type="button" id="toggle-form-financa"><strong>Financeiro</strong></button>
    <i class='bx bx-money-withdraw' style='color:#ffffffc4'></i>
</div>

<div class="servico">
    <button type="button" id="toggle-form-servico"><strong>Serviços</strong></button>
    <i class='bx bx-wrench' style='color:#ffffffc4'></i>
</div>

<div class="usuarios">
    <button type="button" id="toggle-form-usuario"><strong>Usuários</strong></button>
    <i class='bx bxs-user' style='color:#ffffffc4'></i>
</div>


</div>















<div id="form-container" class="form-container hidden">

    <div class="menu">
        <i class='bx bx-menu'></i>
    </div>
    <div class="cabecalho">
        <h2 style="position: relative; top: -30%; color:black"></i>Vendas</h2>
        <h4 style="position: relative; top: -150%; color:black; left: 70%">Sistema de Gestão online</h4>
        <i class='bx bxs-user' undefined ></i>
    </div>

    <div class="dados">
        <p>Dados da venda</p>
    </div>

    <?php
include_once('conectar.php');

$query_clientes = "SELECT nome FROM clientes";
$resultado_clientes = mysqli_query($mysqli, $query_clientes);

$query_produtos = "SELECT DISTINCT nome FROM produtos";
$resultado_produtos = mysqli_query($mysqli, $query_produtos);

$query_marcas = "SELECT DISTINCT marca FROM produtos";
$resultado_marcas = mysqli_query($mysqli, $query_marcas);

$query_modelos = "SELECT DISTINCT modelo FROM produtos";
$resultado_modelos = mysqli_query($mysqli, $query_modelos);

$query_observacoes = "SELECT DISTINCT observacao FROM produtos";
$resultado_observacoes = mysqli_query($mysqli, $query_observacoes);




if(isset($_POST['submit'])){ 
}

?>

    <form action="Dados-Vendass.php" method="post">
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<label for="data">Data: </label>
        <input type="date" id="data" name="data">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label for="vendedor">Vendedor: </label>
       </p></p>
      <p>
  
      <label for="codigo">Cod. Interno:</label>
        <input type="name" id="codigo" name="codigo"></p>


    </form>

    <div class="aba">
      <p style="margin-left: 5%; color:rgb(78, 78, 128); padding-top: 9px;">codigo <span style="white-space: pre;">           </span> Produto <span style="white-space: pre;">                                            </span>Quantidade <span style="white-space: pre;">             </span>Valor Unitário <span style="white-space: pre;">               </span>Lucro <span class="colored" style="white-space: pre;">                         VALOR TOTAL</span></p>
      
      <form action="Dados-Venda.php" method="post" style="position: relative; padding-top:45px;">
        <input type="text" id="cod" name="cod" style=" width: 50px;">
        &nbsp&nbsp&nbsp
    <select name="produto" id="produto" style="height: 4vh;">
        <?php
        while($row = mysqli_fetch_assoc($resultado_produtos)) {
            echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
        }
        ?>
    </select>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="quantidade" name="quantidade" onchange="calcularTotal()" style=" width: 70px;">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="unitario" name="unitario" readonly style="width: 90px;" onchange="calcularTotal()">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="lucro" name="lucro" style=" width: 100px;" readonly>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" id="total" name="total" readonly style=" width: 100px;">
<p></p>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<label for="marca">Marca:</label>
        <select name="marca" id="marca" style="height: 4vh;">
    <?php
    while($row = mysqli_fetch_assoc($resultado_marcas)) {
        echo "<option value='" . $row['marca'] . "'>" . $row['marca'] . "</option>";
    }
    ?>
</select>

        <label style="margin-left:10%;" for="obs">Tipo de pagamento:</label>
        <select id="opcoes" name="tipo" style=" width: 300px; height: 7vh; margin-top: 17px;">
          <option value="Cash">CASH</option>
          <option value="visa">VISA</option>
          <option value="e-mola">E-MOLA</option>
          <option value="m-pesa">M-PESA</option>
          <option value="m-kesh">M-KESH</option>
        </select> <br>
        &nbsp&nbsp&nbsp&nbsp&nbsp; <label for="modelo">Modelo:</label>
        <select name="modelo" id="modelo" style="height: 4vh;"> <br>
   <
    <?php
   
    while($row = mysqli_fetch_assoc($resultado_modelos)) {
        echo "<option value='" . $row['modelo'] . "'>" . $row['modelo'] . "</option>";
    }
    ?>
</select>

<br>
<label for="observacao">Observação:</label>
<select name="observacao" id="observacao" style="height: 4vh; margin-top:8px;">
    <?php
    while($row = mysqli_fetch_assoc($resultado_observacoes)) {
        echo "<option value='" . $row['observacao'] . "'>" . $row['observacao'] . "</option>";
    }
    ?>
</select>

<label for="nome" style="margin-left: 17%;">Cliente:</label>
    <select name="nome" id="nome" style="height: 5vh;">
        <?php
        while($row = mysqli_fetch_assoc($resultado_clientes)) {
            echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
        }
        ?>
    </select>

        <input type="text" style="position:absolute; top: -40%; left:60%; width:20%;" name="vendedor" id="vendedor"  value="<?php echo htmlspecialchars($usuario); ?>" readonly>

        <button type="submit" name="submit" style="background: blue;">CONFIRMAR</button><br>

<script>
document.getElementById("modelo").onchange = function() {
    var modeloSelecionado = this.value;
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "obter_codigo_modelo.php?modelo=" + modeloSelecionado, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("cod").value = xhr.responseText;
        }
    };
    xhr.send();
};
</script>


<script>
function calcularTotal() {
    var quantidade = document.getElementById("quantidade").value;
    var unitario = document.getElementById("unitario").value;

    var total = parseFloat(quantidade) * parseFloat(unitario);
    var lucro = (parseFloat(quantidade) * parseFloat(unitario)) * 0.25;

    document.getElementById("total").value = total.toFixed(2); 
    document.getElementById("lucro").value = lucro.toFixed(2); 
}
</script>

<script>
document.getElementById("modelo").onchange = function() {
    var modeloSelecionado = this.value;
    var observacaoSelecionada = document.getElementById("observacao").value; 

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "obter_valor_modelo.php?modelo=" + modeloSelecionado + "&observacao=" + observacaoSelecionada, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("unitario").value = xhr.responseText;
            calcularTotal();
        }
    };
    xhr.send();
};

document.getElementById("observacao").onchange = function() {
    var observacaoSelecionada = this.value;
    var modeloSelecionado = document.getElementById("modelo").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "obter_valor_observacao.php?modelo=" + modeloSelecionado + "&observacao=" + observacaoSelecionada, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("unitario").value = xhr.responseText;
            calcularTotal(); 
        }
    };
    xhr.send();
};

document.getElementById("quantidade").onchange = function() {
    calcularTotal();
};

</script>


<script>
document.getElementById("modelo").onchange = function() {
    var modeloSelecionado = this.value;
    var observacaoSelecionada = document.getElementById("observacao").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "obter_valor_modelo.php?modelo=" + modeloSelecionado + "&observacao=" + observacaoSelecionada, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("unitario").value = xhr.responseText;
        }
    };
    xhr.send();
};

document.getElementById("observacao").onchange = function() {
    var observacaoSelecionada = this.value;
    var modeloSelecionado = document.getElementById("modelo").value; 

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "obter_valor_observacao.php?modelo=" + modeloSelecionado + "&observacao=" + observacaoSelecionada, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("unitario").value = xhr.responseText;
        }
    };
    xhr.send();
};
</script>

      </form>
   
      
    </div>
    <hr>
    <p>&nbsp&nbsp&nbsp&nbsp&nbspElcidio De Sousa & Jacinto Alexandre</p>
</div>




<div id="form-container-prod" class="form-container-prod hidden">
<div id="php-content" class="content"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "tabela-produtos.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content").appendChild(iframe);
});
</script>

<div class="pro">
  <i class='bx bx-menu' id="pro"> Produtos</i>
</div>
<div class="help">
<a href="manual.pdf" class="help-link" target="_blank" style="text-decoration: none;">
    <i class='bx bxs-help-circle'></i>Tem dúvida? Clique aqui e acesse nosso manual.
</a>

</div>

  <div class="aba-prod">
    <button type="button" class="btn-inserir" id="toggle-form-inserir">Inserir </button>
    <button type="button" class="btn-relatorio" id="toggle-form-relatorio"><a href="editar_produto.php"  style="text-decoration: none; color: black;" >Editar <i class='bx bx-edit' style="font-Size: 18px;"></i></a></button>

    <div class="eliminar">
    <form action="delete-produto.php" method="post">
        &nbsp&nbsp&nbsp&nbsp; Codigo: <input class="input-id" type="text" name="id">
        <input class="btn-eliminar" type="submit" value="Eliminar">
    </form>
    </div>

    <div class="search_prod">
      <form action="">
          <input type="search" id="" placeholder="        Pesquisar por produtos....">
          <i class='bx bx-search-alt-2' style='color: black;'  ></i>
      </form>
    </div>
                                                                                              
      <div id="form-container-inserir" class="form-container-inserir hidden">
        <h2><span style="white-space: pre;">                                                                                  </span>DADOS CADASTRAIS</h2>
        <form action="produtos.php" method="post">
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="cod">Codigo: </label>
          <input type="text" name="codigo-prod" onclick="gerarCodigo()" id="codigo-prod">
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <label class="labObs" for="iva">IVA: </label>
          <input type="text" name="iva-prod" id="iva-prod"></p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="nome">Nome: </label>
          <input type="text" name="nome-prod" id="nome-prod">
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <label class="labObs" for="lucro">%Lucro: </label>
          <input type="text" name="lucro-prod" id="lucro-prod" readonly></p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="marca">Marca: </label>
            <input type="text" name="marca-prod" id="marca-prod">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="valor">Modelo: </label>
            <input type="text" name="modelo-prod" id="modelo-prod">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label for="valor">Observação: </label>
            <input type="text" name="obs-prod" id="obs-prod"></p>
          <p>&nbsp
            <label class="labObs" for="compra">Valor De Compra: </label>
            <input type="text" name="valorCompra-prod" id="valorCompra-prod" required oninput="calcularLucro()"></p>
          <p>&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="volume">Valor De Venda: </label>
            <input type="text" name="valorVenda-prod" id="valorVenda-prod" required oninput="calcularLucro()">
            <button type="submit" class="btn-guardar" name="submit" id="submit">GUARDAR</button>
          </p>
          <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label class="labObs" for="volume">Quantidade: </label>
            <input type="text" name="volume-prod" id="volume-prod"></p>

        </form>
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
      </div>
  </div>

</div>



<div id="form-container-clientes" class="form-container-clientes hidden" >
<div id="php-content-cli" class="content"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "tabela-clientes.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-cli").appendChild(iframe);
});
</script>

  <div class="clie">
    <i class='bx bx-menu' id="pro"> Clientes</i>
  </div>
  <div class="help_clie">
  <a href="manual.pdf" class="help-link" target="_blank" style="text-decoration: none;">
    <i class='bx bxs-help-circle'></i>Tem dúvida? Clique aqui e acesse nosso manual.
  </div>
  <div class="aba-cliente">
    <button type="button" class="btn-inserir-clie" id="toggle-form-inserir-clie">Inserir </button>
    <button type="button" class="btn-relatorio" id="toggle-form-relatorio"><a href="editar_cliente.php"  style="text-decoration: none; color: black;" >Editar <i class='bx bx-edit' style="font-Size: 18px;"></i></a></button>

    <div class="eliminar">
    <form action="delete-clientes.php" method="post">
        &nbsp&nbsp&nbsp&nbsp;  Nome:  <input class="input-id" type="text" name="nome">
        <input class="btn-eliminar" type="submit" value="Eliminar">
    </form>
    </div>

    <div class="search_cli">
      <form action="">
          <input type="search" id="" placeholder="        Pesquisar por clientes....">
          <i class='bx bx-search-alt-2' style='color: black;'  ></i>
      </form>
    </div>
  </div>

  <div id="form-container-inserir-cliente" class="form-container-inserir-cliente hidden">
    <h2 style="color: black;"><span style="white-space: pre;">                                                              </span>DADOS CADASTRAIS</h2>
    <form action="clientes.php" method="post">
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="nome">Nome: </label>
      <input type="text" name="nome" id="nome">
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <label class="labObs" for="data">Data: </label>
      <input type="date" name="data" id="data"></p>
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="nome">Email: </label>
      <input type="email" name="email" id="email">
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <label class="labObs" for="nuit">Nuit: </label>
      <input type="text" name="nuit" id="nuit">
    </p>
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="marca">Contacto: </label>
        <input type="text" name="contacto" id="contacto">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="tipo">Tipo:</label>
        <select id="opcoes" name="tipo">
          <option value="opcao1">Forncedor</option>
          <option value="opcao2">Transportador</option>
          <option value="opcao3">Cliente</option>
          <option value="opcao4">Vendedor</option>
        </select></p>
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="cidade">Cidade: </label>
        <input type="text" name="cidade" id="cidade">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <label class="labObs" for="bairro">Bairro: </label>
        <input type="text" name="bairro" id="bairro">
 </p>
     
      <p>&nbsp&nbsp&nbsp&nbsp
       
        <button type="submit" name="submit" id="submit" class="btn-guardar-cliente">GUARDAR</button>
      </p>


    </form>
  </div>
</div>
</div>


  <div id="form-container-estoque" class="form-container-estoque hidden">

  <?php
include_once('conectar.php');

$query_quantidade_produtos = "SELECT COUNT(*) AS total_produtos FROM produtos";
$resultado_quantidade_produtos = mysqli_query($mysqli, $query_quantidade_produtos);

if ($resultado_quantidade_produtos && mysqli_num_rows($resultado_quantidade_produtos) > 0) {
    $row = mysqli_fetch_assoc($resultado_quantidade_produtos);
    $quantidade_produtos = $row['total_produtos'];

    $valor_input_quantidade = $quantidade_produtos;
} else {
    $valor_input_quantidade = 0;
}
?>

<?php
include_once('conectar.php');

$query_quantidade_vendas = "SELECT COUNT(*) AS total_vendas FROM vendas";
$resultado_quantidade_vendas = mysqli_query($mysqli, $query_quantidade_vendas);

if ($resultado_quantidade_produtos && mysqli_num_rows($resultado_quantidade_vendas) > 0) {
    $row = mysqli_fetch_assoc($resultado_quantidade_vendas);
    $quantidade_vendas = $row['total_vendas'];

    $valor_input_quantidade_vendas = $quantidade_vendas;
} else {
    $valor_input_quantidade_vendas = 0;
}
?>
      <div style=" background-color: rgb(84, 248, 84); width:25%; height:20vh; margin-top:40px; margin-left:30px;">

          <h2 style="position: absolute; color: white; font-size:23px; text-align: center; top:15%; left:11%;">Entradas</h2>
          <input type="text" name="estoq" id="estoq" style="color: white; width: 30%; height: 5vh; margin-top: 25%; margin-left: 38%; background: transparent; border: none; font-size: 30px;" placeholder="0.00" value="<?php echo $valor_input_quantidade; ?>">
      </div>


      <div style="  background-color: rgb(83, 83, 219); width:25%; height:20vh; margin-top:40px; margin-left:30px;">

          <h2 style="position: absolute; color: white; font-size:23px; text-align: center; top:50%; left:11%;">Saidas</h2>
            <input type="text" name="estoq" id="estoq" style="color: white; width: 30%; height: 5vh; margin-top: 25%; margin-left: 38%; background: transparent; border: none; font-size: 30px;" placeholder="0.00" value="<?php echo $valor_input_quantidade_vendas; ?>">
      </div>


    <div class="estq">
      <i class='bx bx-menu' id="pro"> Estoque</i>
    </div>

    <div class="help-estoque">
      <i class='bx bxs-help-circle'> <a href="maunual.pdf" target="_blank" style="text-decoration: none; color:rgb(15, 15, 53);">Tem duvida? Clique aqui e acesse nosso manual.</a></i>
    </div>

      <div class="info">
        <p>Estoque</p>
      </div>

      <div id="php-content-est" class="content-est"></div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "tabela-produtos-estoque.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-est").appendChild(iframe);
});
</script>
  </div>




  <div id="form-container-financeiro" class="form-container-financeiro hidden">
  <div id="php-content-finc" class="content-finc"></div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "fina_cli.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-finc").appendChild(iframe);
});
</script>

<?php
include_once('conectar.php');

$data_atual = date('Y-m-d');

$query_quantidade_vendas_hoje = "SELECT COUNT(*) AS total_vendas FROM vendas WHERE DATE(data) = '$data_atual'";
$resultado_quantidade_vendas_hoje = mysqli_query($mysqli, $query_quantidade_vendas_hoje);

if ($resultado_quantidade_vendas_hoje && mysqli_num_rows($resultado_quantidade_vendas_hoje) > 0) {
    $row = mysqli_fetch_assoc($resultado_quantidade_vendas_hoje);
    $quantidade_vendas_hoje = $row['total_vendas'];

    $valor_input_quantidade_vendas_hoje = $quantidade_vendas_hoje;
} else {
    $valor_input_quantidade_vendas_hoje = 0;
}
?>
    <div class="vendas-hoje">
      <input type="text" id="venda-hoje" placeholder="0.00" value="<?php echo $valor_input_quantidade_vendas; ?>">
      <p><strong>Total Vendas</strong></p>
      <i class='bx bxs-cart' style='color:#ffffffc4'  ></i>
    </div>


    <div class="vendas-total">
      <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" placeholder="0.00">
      <p><strong>Valor Total</strong></p>
      <i class='bx bxs-like'></i></i>
    </div>
    <?php
        $user = 'root';
        $password = 'elcidiosousa84'; 
        $database = 'bd_hyperTecnnology'; 
        $port = 33068; 

        $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') '
                    . $mysqli->connect_error);
        }

        $consulta = $mysqli->query("SELECT SUM(total) AS total_vendas FROM vendas");

        if (!$consulta) {
            die("Erro na consulta: " . $mysqli->error);
        }

        $resultado = $consulta->fetch_assoc();
        $total_vendas = $resultado['total_vendas'];

        echo "<script>document.getElementById('total_vendas_hoje').value = '{$total_vendas}';</script>";

     
    ?>


<?php
$user = 'root';
$password = 'elcidiosousa84'; 
$database = 'bd_hyperTecnnology'; 
$port = 33068; 

$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$consulta = $mysqli->query("SELECT SUM(desconto) AS total_lucro FROM vendas");

if (!$consulta) {
    die("Erro na consulta: " . $mysqli->error);
}

$resultado = $consulta->fetch_assoc();
$total_lucro = $resultado['total_lucro'];


?>
    <div class="vendas-pagar">
      <input type="text" name="total_lucro" id="total_lucro" value="<?php echo $total_lucro; ?>" placeholder="0.00">
      <p><strong>Total Lucros</strong></p>
      <i class='bx bxs-dislike' ></i>
    </div>
 
      <div class="pagamentos">

      <div id="php-content-pag" class="content-pag" ></div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "teste.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-pag").appendChild(iframe);
});
</script>

  </div>
  </div>



  <div id="form-container-usuario" class="form-container-usuario hidden">
    <div class="input-file-container">
        <label for="fileInput" class="file-label"><i class='bx bxs-user' style='color:#ffffffc4'  ></i></label>
        <input type="file" id="fileInput" class="file-input" onchange="exibirArquivo()" accept="image/*">
        <div id="arquivoDiv" class="img"></div>
    </div>

    <div class="form-usuario">

<form action="usuarioad.php" method="post">
  <p></p>
  <label for="nome">Nome:</label>&nbsp&nbsp&nbsp&nbsp&nbsp;
  <input type="text" id="nome" name="nome" required><br>
<p></p>
  <label for="contacto">Email:</label>
  <input type="email" id="contacto" name="email" required><br>
<p></p>
  <label for="usuario">Usuário:</label>&nbsp;
  <input type="text" id="usuario" name="usuario" required><br>
<p></p>
  <label for="senha">Senha:</label>&nbsp&nbsp&nbsp&nbsp;
  <input type="password" id="senha" name="senha" required><br>
<p></p>
  <label for="tipo">Status:</label>
  <select id="status" name="status" required>
    <option value="administrador">Administrador</option>
    <option value="vendedor">Vendedor</option>
  </select>

  <button type="submit" name="submit" class="btn-guardar-usuario">GUARDAR</button>

</form>

    </div>
    <hr>
  </div>



  <div id="form-container-servico" class="form-container-servico hidden">
  <div style="background-color:orange; position:absolute; top:0%; width:100%; height:10vh; left:0%">
        <h2 style="color:white; margin-left:35%">INFORMACOES GERAIS</h2>
        </div>
        <div id="php-content-serv" class="content-serv"></div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "tabela-servico.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-serv").appendChild(iframe);
});
</script>

<?php
include_once('conectar.php');

$query_quantidade_vendas = "SELECT COUNT(*) AS total_vendas FROM produtos";
$resultado_quantidade_vendas = mysqli_query($mysqli, $query_quantidade_vendas);

if ($resultado_quantidade_produtos && mysqli_num_rows($resultado_quantidade_vendas) > 0) {
    $row = mysqli_fetch_assoc($resultado_quantidade_vendas);
    $quantidade_vendas = $row['total_vendas'];

    $valor_input_quantidade_vendas = $quantidade_vendas;
} else {
    $valor_input_quantidade_vendas = 0;
}
?>
    <div style="background-color:orange; position:absolute; top:17%; width:30%; height:15vh; left:20%">

     <label for="des" style="color: white; position:absolute; top:30%; width:48%; height:15vh; left:5%; font-size:25px;">T. Produtos:</label>
      <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:25%; width:30%; height:6vh; left:55%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $valor_input_quantidade_vendas; ?>">
    </div>

    <?php
include_once('conectar.php');

$query_quantidade_vendas = "SELECT COUNT(*) AS total_vendas FROM vendas";
$query_quantidade_func = "SELECT COUNT(*) AS total_func FROM usuarios";
$query_quantidade_cli = "SELECT COUNT(*) AS total_cli FROM clientes";
$resultado_quantidade_cli = mysqli_query($mysqli, $query_quantidade_cli);
$resultado_quantidade_vendas = mysqli_query($mysqli, $query_quantidade_vendas);
$resultado_quantidade_func = mysqli_query($mysqli, $query_quantidade_func);

if ($resultado_quantidade_produtos && mysqli_num_rows($resultado_quantidade_vendas) > 0) {
    $row = mysqli_fetch_assoc($resultado_quantidade_vendas);
    $quantidade_vendas = $row['total_vendas'];

    $valor_input_quantidade_vendass = $quantidade_vendas;
} else {
    $valor_input_quantidade_vendass = 0;
}

if ($resultado_quantidade_cli && mysqli_num_rows($resultado_quantidade_cli) > 0) {
  $row = mysqli_fetch_assoc($resultado_quantidade_cli);
  $quantidade_cli = $row['total_cli'];

  $valor_input_quantidade_cli = $quantidade_cli;
} else {
  $valor_input_quantidade_cli = 0;
}


if ($resultado_quantidade_func && mysqli_num_rows($resultado_quantidade_func) > 0) {
  $row = mysqli_fetch_assoc($resultado_quantidade_func);
  $quantidade_func = $row['total_func'];

  $valor_input_quantidade_func = $quantidade_func;
} else {
  $valor_input_quantidade_func = 0;
}
?>

<div style="background-color:rgb(0, 238, 226); position:absolute; top:36%; width:30%; height:15vh; left:20%">

<label for="des" style="color: white; position:absolute; top:30%; width:48%; height:15vh; left:5%; font-size:25px;">T. vendas:</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:25%; width:30%; height:6vh; left:55%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $valor_input_quantidade_vendass; ?>">
</div>


<div style="background-color: rgb(224, 87, 224); position:absolute; top:55%; width:30%; height:15vh; left:20%">

<label for="des" style="color: white; position:absolute; top:30%; width:58%; height:15vh; left:5%; font-size:25px;">T. Funcionarios:</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:25%; width:20%; height:6vh; left:65%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $valor_input_quantidade_func; ?>">
</div>

<div style="background-color: rgb(236, 71, 159);position:absolute; top:74%; width:30%; height:15vh; left:20%">

<label for="des" style="color: white; position:absolute; top:30%; width:58%; height:15vh; left:5%; font-size:25px;">T. Clientes:</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:25%; width:20%; height:6vh; left:65%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $valor_input_quantidade_cli; ?>">
</div>


<?php
$user = 'root';
$password = 'elcidiosousa84'; 
$database = 'bd_hyperTecnnology'; 
$port = 33068; 

$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$consulta = $mysqli->query("SELECT SUM(total) AS total_valor FROM vendas");

if (!$consulta) {
    die("Erro na consulta: " . $mysqli->error);
}

$resultado_valor = $consulta->fetch_assoc();
$total_valor = $resultado_valor['total_valor'];


?>


<div style="background-color: rgb(250, 142, 92); position:absolute; top:17%; width:25%; height:31vh; left:51%">

<label for="des" style="color: white; position:absolute; top:10%; width:58%; height:15vh; left:5%; font-size:25px;">V. total:</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:9%; width:50%; height:6vh; left:45%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $total_valor; ?>">

 <label for="des" style="color: white; position:absolute; top:63%; width:58%; height:15vh; left:5%; font-size:25px;">Lucro:</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:60%; width:50%; height:6vh; left:45%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $total_lucro; ?>">

</div>


<div style="background-color: rgb(247, 72, 72); position:absolute; top:55%; width:25%; height:31vh; left:51%">

 <label for="des" style="color: white; position:absolute; top:33%; width:58%; height:15vh; left:25%; font-size:25px;">FUNDOS</label>
 <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" style="background-color:transparent; position:absolute; top:50%; width:70%; height:6vh; left:18%; color: white; font-size:25px; border:none;" placeholder="0.00" value="<?php echo $total_lucro + $total_valor; ?> Mts">

</div>

<div id="php-content-ser" class="content-ser"></div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.createElement("iframe");
    iframe.src = "fina_cli.php";
    iframe.style.width = "100%";
    iframe.style.height = "100%";
    iframe.style.border = "none";
    document.getElementById("php-content-ser").appendChild(iframe);
});
</script>

</div>

</div>
</div>



<div class="homee" id="form-container-home">
    <h1 ><img src="Logotipo.png" alt=""> <br>WELCOME TO <BR> HYPER TECNOLOGY <br><br> Sistema de Gestão Onnline </h1>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('form-container-home').classList.remove('hidden');
    document.getElementById('toggle-form-home').addEventListener('click', function() {
        document.getElementById('form-container-home').classList.toggle('hidden');
    });
});



document.getElementById('toggle-form-cliente').addEventListener('click', function() {
    document.getElementById('form-container-clientes').classList.toggle('hidden');
});

document.getElementById('toggle-form-inserir-clie').addEventListener('click', function() {
    document.getElementById('form-container-inserir-cliente').classList.toggle('hidden');
});

document.getElementById('toggle-form-inserir').addEventListener('click', function() {
    document.getElementById('form-container-inserir').classList.toggle('hidden');
});

document.getElementById('toggle-form-prod').addEventListener('click', function() {
    document.getElementById('form-container-prod').classList.toggle('hidden');
});

document.getElementById('toggle-form-vendas').addEventListener('click', function() {
    document.getElementById('form-container').classList.toggle('hidden');
});

document.getElementById('toggle-form-estoque').addEventListener('click', function() {
    document.getElementById('form-container-estoque').classList.toggle('hidden');
});

document.getElementById('toggle-form-financa').addEventListener('click', function() {
    document.getElementById('form-container-financeiro').classList.toggle('hidden');
});

document.getElementById('toggle-form-servico').addEventListener('click', function() {
    document.getElementById('form-container-servico').classList.toggle('hidden');
});

document.getElementById('toggle-form-usuario').addEventListener('click', function() {
    document.getElementById('form-container-usuario').classList.toggle('hidden');
});



  function exibirArquivo() {
    var fileInput = document.getElementById('fileInput');
    var arquivo = fileInput.files[0];
    var arquivoDiv = document.getElementById('arquivoDiv');
    arquivoDiv.innerHTML = '';

    if (arquivo && arquivo.type.startsWith('image/')) {
        var imgElement = document.createElement('img');
        imgElement.src = URL.createObjectURL(arquivo);
        imgElement.classList.add('imagem-preview');
        arquivoDiv.appendChild(imgElement);
    }
}



  </script>


</body>
</html>