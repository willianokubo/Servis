<?php

if (isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
}
if(!isset($_SESSION["email"])){
    header("Location: index.php");
}

$dia = filter_input(INPUT_POST, 'dia');
$hora= filter_input(INPUT_POST, 'hora');
$semana = filter_input(INPUT_POST, 'semana');
$id_us = filter_input(INPUT_POST, 'id');

$_SESSION["id_us"] = $id_us;
$email = $_SESSION["email"];

$expire=time()+60*60*24;

require ("conexao.php");

$sql =  "select id from usuario where email = '$email';";

$result = mysqli_query($con, $sql);

while($rs = mysqli_fetch_array($result)){
    $id_cliente = $rs['id'];
}

$sql = "select us.id, s.custo_hora, s.custo_dia, s.custo_semana from
usuario_servico us INNER JOIN servico s
on us.id_servico = s.id INNER JOIN usuario u
on us.id_usuario = u.id WHERE us.id = '$id_us';";

$result = mysqli_query($con, $sql);
$conta = 0;
while($rs = mysqli_fetch_array($result)){

          $custo_dia = $rs['custo_dia'];
          $custo_hora = $rs['custo_hora'];
          $custo_semana = $rs['custo_semana'];

          $conta = ($dia* $custo_dia)  ;

          $conta = $conta + ($hora * $custo_hora );

          $conta = $conta + ($semana * $custo_semana) ;
}
/*
echo "hora: $hora";
echo "dia: $dia";
echo "semana: $semana";
echo "Conto_hora: $custo_hora";
echo "Conto_dia: $custo_dia";
echo "Custo_semana: $custo_semana";
echo "Conta: $conta";
echo "Cliente:$id_cliente";
echo "Servico:$id_us";
echo "Email:$email";

 */
          $sql = "insert into venda ( id_cliente, id_usuario_servico, status, valor_venda) values ( $id_cliente, $id_us, 'Ativo', $conta);";

          mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

          $sql = "select id as id_venda from venda where id_cliente = $id_cliente and id_usuario_servico = $id_us and valor_venda = $conta;";

          $result = mysqli_query($con, $sql);

          while($rs = mysqli_fetch_array($result)){
             $id_venda = $rs['id_venda'];
          }

         header("location:contratados.php");


         /* echo '
          <!DOCTYPE html>
          <html lang="en">
          <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
          <meta name="description" content="">
          <meta name="author" content="">
          <link rel="icon" href="../../favicon.ico">
          <meta http-equiv="refresh" content="3; url=voucher.php">

          <title>Servis</title>

          <!-- Bootstrap core CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <!-- Custom styles for this template -->
          <link href="css/navbar-fixed-top.css" rel="stylesheet">
          <link href="css/sticky-footer-navbar.css" rel="stylesheet">
          </head>

          <body>
          <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Servis</h4>
                </div>
                <div class="modal-body">
                  <h3>Venda inserida com Sucesso!</h3>
                </div>
                <div class="modal-footer">
                  Obrigado =)
                </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          ';
          require("template/footer.php");
          echo "<script>
          $('#myModal').modal('show')
          </script>";*/

?>
