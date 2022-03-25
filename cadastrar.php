<?php
include 'conexao.php';
$URL_ATUAL = "$_SERVER[REQUEST_URI]";
$url=str_replace('/crud_conteiner/cadastrar.php','',$URL_ATUAL);
$url1=str_replace('1','',$url);

if($url1=="?form=alterar"){
    $link->query("UPDATE tb_conteiner set 
    cd_conteiner='{$_POST['numconteiner']}', nm_cliente='{$_POST['cliente']}', 
    tp_conteiner='{$_POST['Tipo']}', tp_status='{$_POST['Status']}', tp_categoria='{$_POST['Categoria']}'
    where cd_conteiner='{$_POST['numconteiner']}'");
    if($url=="?form=alterar1"){
        $link->query("INSERT into tb_movimentacao(cd_conteiner, tp_movimentacao, dt_inicio, dt_fim) values
        ('{$_POST['numconteiner']}', '{$_POST['tp_mov']}', '{$_POST['dt_inicio']}', '{$_POST['dt_fim']}');");
    }
    header('location:index.php');
}
else if($url1=="?form=deletar"){
    $link->query("DELETE from tb_movimentacao where cd_conteiner='{$_POST['numconteiner']}';");
    $link->query("DELETE from tb_conteiner where cd_conteiner='{$_POST['numconteiner']}';");
    header('location:index.php');
}
else{
    $link->query("INSERT into tb_conteiner(cd_conteiner, nm_cliente, tp_conteiner, tp_status, tp_categoria) values
        ('{$_POST['numconteiner']}', '{$_POST['cliente']}', '{$_POST['Tipo']}', '{$_POST['Status']}', '{$_POST['Categoria']}');");
    header('location:cadastro.php');
}
?>