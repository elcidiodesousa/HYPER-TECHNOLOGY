<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
        }



        .soma {
            margin-top: 40px;
            font-size: 20px;
            font-weight: bold;
        }

        .cadastrados-lista {
            margin-top: 5px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-input {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
      
    
    </style>
</head>
<body>

    <div class="soma">
        <?php
        include_once('conectar.php');

        // Consulta para obter a soma dos totalselecionados
       // $resultado_soma = mysqli_query($mysqli, "SELECT COUNT(*) AS soma FROM produtos");
      //  if ($resultado_soma) {
      //      $row_soma = mysqli_fetch_assoc($resultado_soma);
      //      $soma = $row_soma['soma'];
      //      echo "Total de produtos cadastrados: " . $soma;
     //   } else {
      //      echo "Erro ao mostrar o total.";
     //   }
        ?>
    </div>

    <div class="soma">
    </div>
<p></p>
<p></p>
<p></p>
<div class="tabela">
<table class="cadastrados-lista">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $search = $_GET['search'] ?? '';

            $sql = "SELECT modelo, volume FROM produtos";
            if (!empty($search)) {
                $sql .= " WHERE nome LIKE '%$search%'";
            }

            $resultado_cadastrados = mysqli_query($mysqli, $sql);
            if ($resultado_cadastrados) {
                while ($row_cadastrados = mysqli_fetch_assoc($resultado_cadastrados)) {
                    $nome = $row_cadastrados['modelo'];
                    $numero = $row_cadastrados['volume'];

                    echo "<tr>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $numero . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Erro ao obter a lista dos cadastrados.";
            }
            ?>
        </tbody>
    </table>
</div>
   

</body>
</html>