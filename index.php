<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="nav">
        <a href="index.php">
            <div class="nav_item">
                Inicio
            </div>
        </a>
        <a href="cadastro.php">
            <div class="nav_item">
                Cadastro
            </div>
        </a>
    </div>
    <table>
        <tr>
            <th>Conteiner</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Categoria</th>
        </tr>
        <?php
        include 'conexao.php';
        $dado = $link->query("SELECT * From tb_conteiner;");
        while ($row = $dado->fetch_assoc()) {
            echo "<tr class='conteiners' >
                <td>{$row['cd_conteiner']}</td>
                <td>{$row['nm_cliente']}</td>
                <td>{$row['tp_conteiner']}</td>
                <td>{$row['tp_status']}</td>
                <td>{$row['tp_categoria']}</td>
                <td><a href='relatorio.php?cliente={$row['nm_cliente']}'>Relatorio</a></td>
            </tr>";
        }
        ?>
    </table>
    <script src="./js/index.js"></script>
</body>

</html>