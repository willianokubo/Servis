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


$id_us = filter_input(INPUT_GET, 'id');

$sql = "select us.id, u.nome as usuario_nome, u.email, u.telefone, u.img_perfil, u.classificacao,
s.nome as servico_nome, s.categoria, s.custo_hora, s.custo_dia, s.custo_semana from
usuario_servico us INNER JOIN servico s
on us.id_servico = s.id INNER JOIN usuario u
on us.id_usuario = u.id WHERE us.id = $id_us;";

$result = mysqli_query($con, $sql);

if($rs = mysqli_fetch_array($result)){
?>
<br>
<div class="thumbnail">
  <div class="row">

    <div class="col-sm-12 col-md-4">
      <center><img src="img/img_perfil/<?=$rs["img_perfil"]?>" alt="Avatar" width="50%" class="img-circle"></center>
      <div class="caption">
        <h3 class="text-center"><?=$rs["usuario_nome"]?></h3>
          <h4 class="text-center"><?=$rs["servico_nome"]?></h4>

      </div>
    </div>

  <div class="col-sm-12 col-md-8">
    <h3>Categoria: <?=$rs["categoria"]?></h3>
    <hr>
    <br>
    <form action="insert_venda.php" method="post">
      <div class="form-group">
      <div class="row">
          <div class="col-md-4">
              <label for="custo_hora">Valor hora: R$ <?=$rs["custo_hora"]?></label>
              <input type="custo_hora" class="form-control" name="hora" placeholder="Quantidade de horas">
          </div>
          <div class="col-md-4">
              <label for="custo_dia">Valor dia: R$ <?=$rs["custo_dia"]?></label>
              <input type="text" class="form-control" id="custo_dia" name="dia" placeholder="Quantidade de dias">
          </div>
          <div class="col-md-4">
              <label for="custo_dia">Valor semana: R$ <?=$rs["custo_semana"]?></label>
              <input type="text" class="form-control" id="custo_semana" name="semana" placeholder="Quantidade de semanas">
          </div>
      </div>
      </div>

        <input type="hidden" name="id" value="<?php print $id_us; ?>">
        <br>
        <p class="text-right">
        <button type="submit" class="btn btn-success btn-block">Contratar</button>
      </p>
      </form>
    </div>
  </div>
</div>
<?php

}else{

    $redirect = "http://localhost/site/busca.php";
    header("location:$redirect");
    echo '<script>confirm("E-mail ou senha invalidos");</script>';

}

require("template/footer.php"); ?>
