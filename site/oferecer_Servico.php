<?php
if (isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
}
if(!isset($_SESSION["email"])){
    header("Location: index.php");
}
$email = $_SESSION["email"];

require("template/header.php");
require("template/nav.php");

require("conexao.php");

$result_servicos2 = "select id from usuario where email = '$email';";
$resultado_servicos2 = mysqli_query($con, $result_servicos2);

$resul2 = mysqli_fetch_array($resultado_servicos2);
$number = $resul2[0];

$result_servicos3 = "SELECT * from servico WHERE id in (SELECT id_servico FROM usuario_servico WHERE id_usuario = '$number')";
$resultado_servicos3 = mysqli_query($con, $result_servicos3);

$result_servicos = "SELECT * from servico WHERE id not in (SELECT id_servico FROM usuario_servico WHERE id_usuario = '$number')";
$resultado_servicos = mysqli_query($con, $result_servicos);
?>
<h3><b>Serviços que ofereço</b></h3>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nome do Serviço</th>
      <th>Categoria</th>
      <th>Custo hora</th>
      <th>Custo dia</th>
      <th>Custo semana</th>
    <th class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php while($rs = mysqli_fetch_array($resultado_servicos3)){ ?>
        <tr>
          <td><?=$rs["nome"]?></td>
          <td><?=$rs["categoria"]?></td>
          <td><?=$rs["custo_hora"]?></td>
          <td><?=$rs["custo_dia"]?></td>
          <td><?=$rs["custo_semana"]?></td>
        <td class="text-center"><a href="retirar.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-remove"></span></a></td>    
        </tr>

    <?php }?>
      </tbody>
    </table>

<br>
<h3>Serviços disponíveis para oferecer</h3>
<hr>
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nome do Serviço</th>
      <th>Categoria</th>
      <th>Custo hora</th>
      <th>Custo dia</th>
      <th>Custo semana</th>
      <th class="text-center">Oferecer</th>
    </tr>
  </thead>
  <tbody>

<?php while($rs2 = mysqli_fetch_array($resultado_servicos)){ ?>
    <tr>
      <td><?=$rs2["nome"]?></td>
      <td><?=$rs2["categoria"]?></td>
      <td><?=$rs2["custo_hora"]?></td>
      <td><?=$rs2["custo_dia"]?></td>
      <td><?=$rs2["custo_semana"]?></td>
      <td class="text-center"><a href="oferecer.php?id=<?=$rs2['id']?>" class="btn btn-info">Oferecer</a></td>
    </tr>

<?php }?>
  </tbody>
</table>
<?php require("template/footer.php"); ?>
