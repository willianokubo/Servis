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
?>

<br>

<ol class="breadcrumb">
  <li class="active">Home</li>
</ol>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <a href="servicos.php">
      <div class="thumbnail">
        <img src="../img/job_icon.png" alt="..." width="50%">
        <div class="caption">
            <h3 class="text-center">Controle de Serviços</h3>
        </div>
      </div>
    </a>
  </div>
    
    <div class="col-sm-6 col-md-4">
    <a href="usuarios.php">
      <div class="thumbnail">
        <img src="../img/user_icon.svg" alt="..." width="50%">
        <div class="caption">
            <h3 class="text-center">Controle de Usuários</h3>
        </div>
      </div>
    </a>
  </div>
    
    <div class="col-sm-6 col-md-4">
    <a href="vendas.php">
      <div class="thumbnail">
        <img src="../img/services_icon.png" alt="..." width="50%">
        <div class="caption">
            <h3 class="text-center">Controle de Vendas</h3>
        </div>
      </div>
    </a>
  </div>
</div>
<?php require("../template/footer.php"); ?>
