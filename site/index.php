<?php
if (isset($_SESSION["email"])){
  header("Location: home.php");
}
elseif(isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
  header("Location: home.php");
}
require("template/header.php");
require("template/nav_index.php");
?>



<!-- Main component for a primary marketing message or call to action -->
<br><br><br><br><br>
<div class="row">
  <div class="col-md-12">
    <h2 class="text-center">Encontre o serviço ideal pelo melhor preço!</h2>
    <br>
    <p>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input type="text" class="form-control input-lg" list="servicos" name="servico" placeholder="Ex.: Fotógrafo...">
                <datalist id="servicos">
                  <option value="Fotografo">
                    <option value="Pedreiro">
                      <option value="Eletricista">
                      </datalist>
                      <span class="input-group-btn">
                        <button onclick="window.location='busca.html'" class="btn btn-success input-lg" type="button">Procurar</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /div col-->
                </div>
              </div><!-- /div col-->
            </div>
          </p>
        </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel">Entrar na conta</h3>
            </div>
            <div class="modal-body">
              <div class="col-md-10 col-md-offset-1">


                <form action="login.php" method="post">
                  <div class="form-group">
                    <!--<label for="exampleInputEmail1">Email</label>-->
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon" id="sizing-addon1"><span class="fa fa-envelope"></span></span>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <!--<label for="exampleInputPassword1">Senha</label>-->
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon" id="sizing-addon1"><span class="fa fa-lock" style="width:20px;"></span></span>
                      <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                    </div>
                  </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Entrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php require("template/footer.php");


      if (isset($_GET["erro"])){
        echo '<script>confirm("E-mail ou senha invalidos"); </script>';

        echo "<script> $('#exampleModal').modal('show'); </script>";
      }
      ?>
