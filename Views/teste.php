<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de ComboBox com PHP e MySQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .pagamentos {
            width: 100%;
            height: 70vh;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        label, select, input, button {
            margin: 10px;
            height: 40px;
            font-size: 16px;
            border-radius: 4px;
            padding: 8px;
            box-sizing: border-box;
        }

        select, input[type="text"] {
            width: 200px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="pagamentos">

<div style="background-color:orange; position: absolute; top:3%; left:-5%; width:110%; height:10vh;">
    <h2 style="color: white; font-size:20px; text-align: center; margin-left:5%;">Pagamento De Salarios</h2>
</div>

<?php
// Incluir arquivo de conexão
include_once('conectar.php');

// Inicializar variáveis
$contagem = 0;
$bonus = 0;
$salario_total = 10000; // Salário padrão

// Verificar se um vendedor foi selecionado
if (isset($_POST['vendedor']) && $_POST['vendedor'] != "") {
    $produtoSelecionado = $_POST['vendedor'];

    // Consulta para contar o número de ocorrências do vendedor selecionado
    $query_contagem = "SELECT COUNT(*) AS total FROM vendas WHERE vendedor = '$produtoSelecionado'";
    $resultado_contagem = mysqli_query($mysqli, $query_contagem);

    // Obter o resultado da contagem
    if ($resultado_contagem) {
        $row_contagem = mysqli_fetch_assoc($resultado_contagem);
        $contagem = $row_contagem['total'];
        // Calcular o bônus e o salário total
        $bonus = intval($contagem) * 100;
        $salario_total += $bonus;
    } else {
        $contagem = "Erro ao contar ocorrências";
    }
}

// Verificar se o formulário de confirmação foi enviado
if (isset($_POST['confirmar'])) {
    $vendedor = $_POST['vendedor'];
    $metodo = $_POST['metodo'];
    $conta = $_POST['conta'];
    $salario = $salario_total;

    // Inserir os dados na tabela de pagamentos
    $query_inserir = "INSERT INTO pagamentos (vendedor, metodo, conta, salario) VALUES ('$vendedor', '$metodo', '$conta', '$salario')";
    if (mysqli_query($mysqli, $query_inserir)) {
        echo "<p style='color: green; text-align: center;'>Pagamento salvo com sucesso!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Erro ao salvar pagamento: " . mysqli_error($mysqli) . "</p>";
    }
}

// Consulta para obter os vendedores disponíveis
$query_produtos = "SELECT DISTINCT vendedor FROM vendas";
$resultado_produtos = mysqli_query($mysqli, $query_produtos);
?>

<form method="post" action="">
    <h2 style="position:absolute; top:13%; left:5%; width:15%;">Funcionario</h2>
    <select name="vendedor" id="vendedor" style="position:absolute; top:20%; left:3%;" onchange="updateInput(this.value)">
        <option value="">Selecione um vendedor</option>
        <?php
        // Preencher o ComboBox com vendedores
        while ($row = mysqli_fetch_assoc($resultado_produtos)) {
            $selected = (isset($_POST['vendedor']) && $_POST['vendedor'] == $row['vendedor']) ? 'selected' : '';
            echo "<option value='" . $row['vendedor'] . "' $selected>" . $row['vendedor'] . "</option>";
        }
        ?>
    </select>

    <!-- Input para exibir a contagem -->
    <h2 style="position:absolute; top:13%; left:42%; width:15%;">Bonus</h2>
    <input type="text" style="position:absolute; top:20%; left:40%; width:20%;" id="contagem" name="contagem" value="<?php echo $bonus; ?>" readonly>

    <input type="submit" value="Calcular" style="position:absolute; top:20%; left:65%; width:20%;">
</form>

<form method="post" action="salarios.php">
    <h2 style="position:absolute; top:33%; left:5%; width:35%;">Metodo de pagamento</h2>
    <select id="metodo" name="metodo" style="position:absolute; top:40%; left:3%; width:35%;">
        <option value="Cash">CASH</option>
        <option value="visa">VISA</option>
        <option value="e-mola">E-MOLA</option>
        <option value="m-pesa">M-PESA</option>
        <option value="m-kesh">M-KESH</option>
    </select>

    <h2 style="position:absolute; top:33%; left:51%; width:35%;">Num./NIB</h2>
    <input type="text" name="conta" id="conta" placeholder="(+258)/0001" style="position:absolute; top:40%; left:50%; width:35%;">

    <h2 style="position:absolute; top:52%; left:5%; width:15%;">Salario</h2>
    <input type="text" name="salario" id="salario" placeholder="0.00" value="<?php echo $salario_total; ?>" readonly style="position:absolute; top:60%; left:3%; width:25%;">

    <input type="hidden" name="nome" id="vendedor_selecionado" value="<?php echo isset($_POST['vendedor']) ? $_POST['vendedor'] : ''; ?>" style="position:absolute; top:50%; left:3%; width:35%;" readonly>

    <input type="hidden" name="bonus" value="<?php echo $bonus; ?>">

    <button type="submit" name="confirmar" style="position:absolute; top:60%; left:35%; width:35%;">CONFIRMAR</button>
</form>

<script>
    function updateInput(value) {
        document.getElementById('vendedor_hidden').value = value;
    }
</script>

</div>
</body>
</html>
