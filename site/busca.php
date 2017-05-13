<?php
if (isset($_SESSION["email"])){
  header("Location: home.php");
}
elseif(isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
  header("Location: home.php");
}
else{
  header("Location: index.php");
}
require("template/header.php");
require("template/nav.php");
?>
        <!-- Main component for a primary marketing message or call to action -->
          <br>
          <p>
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control input-lg" list="servicos" name="servico" placeholder="Ex.: Fotógrafo..." value="fotógrafo">
                    <datalist id="servicos">
                      <option value="Fotografo">
                      <option value="Pedreiro">
                      <option value="Eletricista">
                    </datalist>
                  <span class="input-group-btn">
                    <button class="btn btn-success input-lg" type="button">Procurar</button>
                  </span>
                </div><!-- /input-group -->
            </div><!-- /div col-->
            </div>
          </p>
        </div>
        </div>


        <img style="margin-left:270px; margin-top:20px;" src="img/procurando.png" alt="profissional"/>
        <img style="margin-left:270px; margin-top:20px;" src="img/procurando.png" alt="profissional"/>

      <?php require("template/footer.php"); ?>
