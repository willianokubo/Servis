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
?>
        <!-- Main component for a primary marketing message or call to action -->
          <br>
          <br>
          <br>
          <br>
          <h2 class="text-center">Procure o serviço que desejar!</h2>
          <br>
          <p>
            <form method="post" action="busca.php">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input type="text" class="form-control input-lg" list="servicos" name="servico" placeholder="Ex.: Fotógrafo...">
                    <datalist id="servicos">
                      <option value="Fotografo">
                      <option value="Pedreiro">
                      <option value="Eletricista">
                    </datalist>
                  <span class="input-group-btn">
                    <input type="submit" class="btn btn-success input-lg" value="Procurar"/>
                  </span>
                </div><!-- /input-group -->
            </div><!-- /div col-->
            </div>
            </form>
          </p>
        </div>
        </div>

      <?php require("template/footer.php"); ?>
