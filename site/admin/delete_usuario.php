<?php
$id = filter_input(INPUT_GET, 'id');

require ("../conexao.php");
$sql = mysqli_query($con, "delete from usuario where id = '$id';") or die ("Erro de sintaxe, verifique o codigo");

header("Location: usuarios.php");

?>
