<?php
header('Content-Type: application/json');
include 'conexao.php';
$cliente=$_POST['id'];
$servico=mysqli_query($link,"SELECT * from tb_conteiner where cd_conteiner='{$cliente}';");
if (mysqli_num_rows($servico) >= 1) {
    echo json_encode(mysqli_fetch_all($servico, MYSQLI_ASSOC));
    //echo json_encode($sqlpesqServ);
} else {
    echo json_encode('Nenhum fornecedor encontrado');
}
?>