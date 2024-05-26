<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total de Vendas</title>
</head>
<body>
    <div class="vendas-total">
        <input type="text" name="total_vendas_hoje" id="total_vendas_hoje" placeholder="0.00">
        <p><strong>Valor Hoje</strong></p>
        <i class='bx bxs-like'></i>
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
</body>
</html>
