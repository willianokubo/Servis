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
$result_servicos = "select * from servico order by categoria, nome;";

$resultado_servicos = mysqli_query($con, $result_servicos);
?>
<br>
<ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active">Serviços</li>
</ol>

<h2>Serviços</h2>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nome do Serviço</th>
      <th>Categoria</th>
      <th>Custo hora</th>
      <th>Custo dia</th>
      <th>Custo semana</th>
      <th class="text-center">Editar</th>
      <th class="text-center">Excluir</th>
    </tr>
  </thead>
  <tbody>

<?php while($rs = mysqli_fetch_array($resultado_servicos)){ ?>
    <tr>
      <td><?=$rs["nome"]?></td>
      <td><?=$rs["categoria"]?></td>
      <td><?=$rs["custo_hora"]?></td>
      <td><?=$rs["custo_dia"]?></td>
      <td><?=$rs["custo_semana"]?></td>
      <td class="text-center"><a href="atualizar_servico.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td class="text-center"><a href="delete_servico.php?id=<?=$rs["id"]?>"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>

<?php }?>
  </tbody>
</table>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel">Serviço atualizado com sucesso!</h3>
            </div>
            <!--<div class="modal-body">
                <div class="col-md-10 col-md-offset-1">
                </div>
            </div>-->
        </div>
      </div>
</div>

<?php require("../template/footer.php"); 
    if (isset($_GET["update"])){
        echo "<script> $('#exampleModal').modal('show'); </script>";
      }
?>
    