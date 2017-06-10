<?php
if (isset($_COOKIE["email_admin"])){
  $_SESSION["email_admin"] = $_COOKIE["email_admin"];
}
if(!isset($_SESSION["email_admin"])){
    header("Location: index.php");
}

$nome = filter_input(INPUT_POST, 'nome');
$categoria = filter_input(INPUT_POST, 'categoria');
$custo_dia = filter_input(INPUT_POST, 'custo_dia'); //remove qualquer caracter não numerico
$custo_semana = filter_input(INPUT_POST, 'custo_semana');
$custo_hora = filter_input(INPUT_POST, 'custo_hora');

require ("../conexao.php");
$sql = "insert into servico (nome, categoria, custo_hora, custo_dia, custo_semana) values ('$nome', '$categoria', $custo_hora, $custo_dia, $custo_semana)";
mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

header("Location: servicos.php?create=1");

?>
