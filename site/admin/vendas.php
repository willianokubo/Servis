<?php
if (isset($_COOKIE["email_admin"])){
  $_SESSION["email_admin"] = $_COOKIE["email_admin"];
}
if(!isset($_SESSION["email_admin"])){
    header("Location: index.php");
}
$email = $_SESSION["email_admin"];
require("../template/header.php");
require("../template/nav.php");

require("../conexao.php");
$result_servicos = "select * from venda;";

$resultado_servicos = mysqli_query($con, $result_servicos);
?>

<br>
<ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active">Vendas</li>
</ol>

<h2>Vendas de Serviços</h2>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Valor da venda</th>
      <th>Status</th>
      <th>id_cliente</th>
      <th>id_funcionario</th>
      <th>id_servico</th>
      <th class="text-center">Editar</th>
      <th class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>

<?php while($rs = mysqli_fetch_array($resultado_servicos)){ ?>
    <tr>
      <td><?=$rs["valor_venda"]?></td>
      <td><?=$rs["status"]?></td>
      <td><?=$rs["id_cliente"]?></td>
      <td><?=$rs["id_funcionario"]?></td>
      <td><?=$rs["id_servico"]?></td>
      <td class="text-center"><a href="update_venda.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td class="text-center"><a href="delete_venda.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>

<?php }?>
  </tbody>
</table>
<?php require("../template/footer.php"); ?>