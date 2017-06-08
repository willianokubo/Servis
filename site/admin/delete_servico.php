<?php
$id = filter_input(INPUT_GET, 'id');

require ("../conexao.php");
$sql = mysqli_query($con, "delete from servico where id = '$id';") or die ("Erro de sintaxe, verifique o codigo");

header("Location: servicos.php");

?>
