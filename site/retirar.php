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


$sql = "delete from usuario_servico where id_usuario = $id_user and id_servico = $id;";
mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");


header("Location: oferecer_Servico.php");

?>
