<?php
if (isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
}
if(!isset($_SESSION["email"])){
    header("Location: index.php");
}
$email = $_SESSION["email"];

$id = filter_input(INPUT_GET, 'id');
require ("conexao.php");

$result_servicos2 = "select id from usuario where email = '$email';";
$resultado_servicos2 = mysqli_query($con, $result_servicos2);

$resul2 = mysqli_fetch_array($resultado_servicos2);
$id_user = $resul2[0];

$sql = "insert into usuario_servico (id_usuario, id_servico) values ($id_user, $id)";
mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

//$sqlConsulta = "select MAX(id) from servico";
//$result = mysqli_query($con, $sqlConsulta) or die ("Erro de sintaxe, verifique o codigo ooh.");

//$resul2 = mysqli_fetch_array($result);

//$number = $resul2[0];

//$sql2 = "insert into usuario_servico (id_usuario,id_servico) values (5, '$number')";
//mysqli_query($con, $sql2) or die ("Erro de sintaxe, verifique o codigo, na SQL2.");

header("Location: oferecer_Servico.php");

?>
