<?php
$id = filter_input(INPUT_GET, 'id');

require ("conexao.php");
$sql = mysqli_query($con, "update venda set status = '2' where id = $id;") or die ("Erro de sintaxe, verifique o codigo");

header("Location: trabalhos.php");

?>
