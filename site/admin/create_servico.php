<?php
if (isset($_COOKIE["email_admin"])){
  $_SESSION["email_admin"] = $_COOKIE["email_admin"];
}
if(!isset($_SESSION["email_admin"])){
    header("Location: index.php");
}

$descServico = filter_input(INPUT_POST, 'descServico');
$tipoServico = filter_input(INPUT_POST, 'tipoServico');
$custoDia = filter_input(INPUT_POST, 'custoDia'); //remove qualquer caracter não numerico
$custoSemana = filter_input(INPUT_POST, 'custoSemana');
$custoHora = filter_input(INPUT_POST, 'custoHora');

require ("conexao.php");
$sql = "insert into servico (nome, categoria, custo_hora, custo_dia, custo_semana) values ('$descServico', '$tipoServico', '$custoHora', '$custoDia', '$custoSemana')";
mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

$sqlConsulta = "select MAX(id) from servico";
$result = mysqli_query($con, $sqlConsulta) or die ("Erro de sintaxe, verifique o codigo ooh.");

$resul2 = mysqli_fetch_array($result);

$number = $resul2[0];

$sql2 = "insert into usuario_servico (id_usuario,id_servico) values (5, '$number')";
mysqli_query($con, $sql2) or die ("Erro de sintaxe, verifique o codigo, na SQL2.");

header("Location: index.php");

?>
