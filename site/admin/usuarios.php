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
$result_servicos = "select * from usuario order by nome;";

$result = mysqli_query($con, $result_servicos);
?>
<br>
<ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active">Usuários</li>
</ol>

<h2>Usuários</h2>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Endereço</th>
      <th>Telefone</th>
      <th>E-mail</th>
      <th class="text-center">Classificação</th>
      <th class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>

<?php while($rs = mysqli_fetch_array($result)){ ?>
    <tr>
      <td><?=$rs["nome"]?></td>
      <td><?=$rs["endereco"]?></td>
      <td><?=$rs["telefone"]?></td>
      <td><?=$rs["email"]?></td>
      <td class="text-center"><?=$rs["classificacao"]?> <span class="glyphicon glyphicon-star"></span></td>
      <td class="text-center"><a href="delete_usuario.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>

<?php }?>
  </tbody>
</table>
<?php require("../template/footer.php"); ?>
