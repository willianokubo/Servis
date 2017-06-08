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


$pesquisar = filter_input(INPUT_POST, 'servico');

$result_servicos = "select us.id, u.nome as usuario_nome, u.email, u.telefone, u.classificacao,
s.nome as servico_nome, s.categoria, s.custo_hora, s.custo_dia, s.custo_semana from
usuario_servico us INNER JOIN servico s
on us.id_servico = s.id INNER JOIN usuario u
on us.id_usuario = u.id WHERE s.nome LIKE '%$pesquisar%'";

$resultado_servicos = mysqli_query($con, $result_servicos);
$i = 4;
while($busca = mysqli_fetch_array($resultado_servicos)){
  echo ($i%4 == 0) ? '<br> <div class="row">':'';
?>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="img/img_perfil/no_user_icon.png" alt="Avatar" width="50%" class="img-circle">
      <div class="caption">
        <h3 class="text-center"><?=$busca["usuario_nome"]?></h3>
        <p>...</p>
        <p><a href="#" class="btn btn-success btn-block" role="button">Contratar</a></p>
      </div>
    </div>
  </div>


<?php
$i++;
echo ($i%4 == 0) ? '</div>':'';

}
require("template/footer.php"); ?>
