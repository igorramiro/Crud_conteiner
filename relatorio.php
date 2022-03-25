<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
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
    <h2>Relatorio</h2>
    <?php 
        include 'conexao.php';
        $URL_ATUAL = "$_SERVER[REQUEST_URI]";
        $url=str_replace('/crud_conteiner/relatorio.php?cliente=','',$URL_ATUAL);
        $dado = $link->query("SELECT * From tb_conteiner where nm_cliente='$url';");
        while ($row = $dado->fetch_assoc()) {
            echo "<ul>{$row['cd_conteiner']}-{$row['tp_status']}-{$row['tp_conteiner']}-{$row['tp_categoria']}</ul>";
            $dado1 = $link->query("SELECT * From tb_movimentacao where cd_conteiner='{$row['cd_conteiner']}';");
            while ($row1 = $dado1->fetch_assoc()) {
                echo "<li>{$row1['tp_movimentacao']}</li>
                <li>{$row1['dt_inicio']}</li>
                <li>{$row1['dt_fim']}</li>";
            }
            echo "<br>";
        }
        $dado1 = $link->query("SELECT count(tp_categoria) as c From tb_conteiner where tp_categoria='Importação';");
        $row=$dado1->fetch_assoc();
        echo "Importações:".$row['c']."<br>";
        $dado1 = $link->query("SELECT count(tp_categoria) as c From tb_conteiner where tp_categoria='Exportações';");
        $row=$dado1->fetch_assoc();
        echo "Exportações:";$row['c'];
    ?>
</body>
</html>