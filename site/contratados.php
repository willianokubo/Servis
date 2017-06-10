<?php
$erro = filter_input(INPUT_GET, 'erro');

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

$sql = "select v.id as v_id, u.nome as us_nome, u.img_perfil as us_img, u.email as us_email,
 s.nome as s_nome, s.categoria, v.status, v.valor_venda, c.nome, c.endereco
 from venda v inner join usuario_servico us
 on v.id_usuario_servico = us.id INNER JOIN servico s
 on us.id_servico = s.id INNER JOIN usuario u
 on us.id_usuario = u.id inner join usuario c
 on v.id_cliente = c.id WHERE c.email = '$email' and v.status <> '0';";

$result = mysqli_query($con, $sql);
echo "<br>";
while($rs = mysqli_fetch_array($result)){



?>
<div class="thumbnail">
  <div class="row">

    <div class="col-sm-12 col-md-4">
      <center><img src="img/img_perfil/<?=$rs['us_img']?>" alt="Avatar" width="50%" class="img-circle"></center>
      <div class="caption">
        <h3 class="text-center"><?=$rs["us_nome"]?></h3>
          <h4 class="text-center"><b><?=$rs["s_nome"]?></b></h4>

      </div>
    </div>

  <div class="col-sm-12 col-md-8">
    <h3>Categoria: <b><?=$rs["categoria"]?></b></h3>
    <hr>
    <br>
    <form action="boletophp-master/boleto_servis_bb.php" method="post">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Valor do Serviço</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?=$rs["nome"]?></td>
            <td>R$ <?=$rs["valor_venda"]?></td>
            <?php
            if($rs["status"] == "1"){
              echo '<td><span class="label label-default">Pendente de aprovação</span></td>';
            }
            elseif ($rs["status"] == "2") {
              echo '<td><span class="label label-primary">Em execução</span></td>';
            }
            elseif ($rs["status"] == "3") {
              echo '<td><span class="label label-success">Realizado</span></td>';
            }
            ?>
          </tr>
        </tbody>
      </table>

        <input type="hidden" name="id" value="<?=$rs["v_id"]?>">
        <input type="hidden" name="us_nome" value="<?=$rs["us_nome"]?>">
        <input type="hidden" name="s_nome" value="<?=$rs["s_nome"]?>">
        <input type="hidden" name="categoria" value="<?=$rs["categoria"]?>">
        <input type="hidden" name="nome" value="<?=$rs["nome"]?>">
        <input type="hidden" name="valor_venda" value="<?=$rs["valor_venda"]?>">
        <input type="hidden" name="endereco" value="<?=$rs["endereco"]?>">
        <br>
        <div class="row">
          <div class="col-md-4">
            <a href="cancelar_venda.php?id=<?=$rs["v_id"]?>" class="btn btn-danger btn-block">cancelar</a>
          </div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-success btn-block">Pagar</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
}
require("template/footer.php"); ?>
