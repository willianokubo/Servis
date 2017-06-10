<?php
if(isset($_SESSION["email_admin"])){
$img_perfil = "no_user_icon.png";
}
else{
require("conexao.php");

$sql = "select id, nome, telefone, img_perfil, classificacao from usuario where email = '$email';";
$result = mysqli_query($con, $sql);
while($rs = mysqli_fetch_array($result)){
  $img_perfil = $rs['img_perfil'];
}
}
?>
<!-- Fixed navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <?php if(isset($_SESSION["email_admin"])){ ?>
                <a href="#"><img src="../img/img_perfil/<?=$img_perfil?>" alt="Avatar" width="30px" class="img-circle"></a>
              <?php } else{?>
              <a href="#"><img src="img/img_perfil/<?=$img_perfil?>" alt="Avatar" width="30px" class="img-circle"></a>
              <?php }?>
              <p class="small">Menu</p>
            </button>
            <a class="navbar-brand" href="index.php">Servis</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="home.php">Home</a></li>
              <?php if(isset($_SESSION["email_admin"])){ ?>
                <li><a href="insere_servico.php"><span class="glyphicon glyphicon-plus"></span> Adicionar serviço</a></li>
                <?php } else{?>
              <li><a href="oferecer_Servico.php"><span class="glyphicon glyphicon-plus"></span> Oferecer serviço</a></li>
              <li><a href="contratados.php"><span class="glyphicon glyphicon-briefcase"></span> Serviços solicitados</a></li>
              <li><a href="trabalhos.php"><span class="glyphicon glyphicon-stats"></span> Demanda de serviços</a></li>
              <?php }?>
              <li><a href="#contact"></a></li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <?php if(isset($_SESSION["email_admin"])){ ?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../img/img_perfil/<?=$img_perfil?>" alt="Avatar" width="30px" class="img-circle"> <?=$email?> <span class="glyphicon glyphicon-option-vertical"></span></a>
                <?php } else{?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/img_perfil/<?=$img_perfil?>" alt="Avatar" width="30px" class="img-circle"> <?=$email?> <span class="glyphicon glyphicon-option-vertical"></span></a>
                <?php }?>

                <ul class="dropdown-menu">
                  <li><a href="atualizar_usuario.php">Editar perfil</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="logout.php">Sair</a></li>
                </ul>
              </li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

      <div class="container">
