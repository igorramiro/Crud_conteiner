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
    <div>
        <form action="cadastrar.php" method="post">
            <div>
                <label for="">Cliente</label><br>
                <input type="text" name="cliente">
            </div>
            <div>
                <label for="">Nº do conteiner</label><br>
                <input type="text" name="numconteiner">
            </div>
            <div>
                <label for="">Tipo</label><br>
                <input type="radio" name="Tipo" id="tp_20" value="20">20
                <input type="radio" name="Tipo" id="tp_40" value="40">40
            </div>
            <div>
                <label for="">Status</label><br>
                <input type="radio" name="Status" id="st_Cheio" value="Cheio">Cheio
                <input type="radio" name="Status" id="st_Vazio" value="Vazio">Vazio
            </div>
            <div>
                <label for="">Categoria</label><br>
                <input type="radio" name="Categoria" id="ct_Importação" value="Importação">Importação
                <input type="radio" name="Categoria" id="ct_Exportação" value="Exportação">Exportação
            </div>
            <div>
                <label for="">Realizar movimentação?</label><br>
                <input type="radio" name="realizamov" id="" value="sim" checked>sim
                <input type="radio" name="realizamov" id="" value="nao">nao
            </div>
            <?php
            $URL_ATUAL = "$_SERVER[REQUEST_URI]";
            $url=str_replace('/crud_conteiner/cadastro.php?','',$URL_ATUAL);
            $url1=str_replace('alterar=','',$url);
            if ($url == 'alterar='.$url1) {
            ?>
            <div>
                <label for="">Tipo de movimentação</label><br>
                <select name="tp_mov" id="">
                    <option value="embarque">embarque</option>
                    <option value="descarga">descarga</option>
                    <option value="gate in">gate in</option>
                    <option value="gate out">gate out</option>
                    <option value="reposicionamento">reposicionamento</option>
                    <option value="pesagem">pesagem</option>
                    <option value="scanner">scanner</option>
                </select>
            </div>
            <div>
                <label for="">Data de inicio</label><br>
                <input type="datetime-local" name="dt_inicio" id="">
            </div>
            <div>
                <label for="">Data de inicio</label><br>
                <input type="datetime-local" name="dt_fim" id="">
            </div>
            <button id="delete">Excluir</button>
            <?php } ?>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <script src="./js/index.js"></script>
</body>

</html>