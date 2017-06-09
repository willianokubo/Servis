<?php
if (isset($_COOKIE["email_admin"])){
  $_SESSION["email_admin"] = $_COOKIE["email_admin"];
}
if(!isset($_SESSION["email_admin"])){
    header("Location: index.php");
}
 
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$categoria = filter_input(INPUT_POST, 'categoria');
$custo_dia = filter_input(INPUT_POST, 'custo_dia'); //remove qualquer caracter não numerico
$custo_semana = filter_input(INPUT_POST, 'custo_semana');
$custo_hora = filter_input(INPUT_POST, 'custo_hora');

require ("../conexao.php");
$sql = "update servico set nome = '$nome', categoria = '$categoria', custo_hora = '$custo_hora', custo_dia = '$custo_dia', custo_semana='$custo_semana' where id= $id;";
mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

$sqlConsulta = "select MAX(id) from servico";
$result = mysqli_query($con, $sqlConsulta) or die ("Erro de sintaxe, verifique o codigo ooh.");

$resul2 = mysqli_fetch_array($result);

header("Location: servicos.php?update=1");

?>
