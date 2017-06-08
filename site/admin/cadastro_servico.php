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
            <div class="col-md-6 col-md-offset-3">
              <form action="create_servico.php" method="post" id="form-servico">
                <h2>Ofereça um serviço</h2>
                    <div class="form-group">
                      <label for="precoServico">Descreva o serviço sucintamente:</label>
                      <input type="text" class="form-control" id="descServico" name="descServico" placeholder="Descreva o serviço">
                    </div>

                    <div class="form-group">
                      <label for="sel1">Escolha a categoria do serviço</label>
                      <select class="form-control" id="tipoServico" name="tipoServico">
                        <!-- colocar aqui as opções utilizando uma <<option></option> -->
                        <option value=""></option>
                        <option value="Empreiteiro">Empreiteiro</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="precoServico">Custo hora</label>
                        <input type="text" class="form-control" id="custoHora" name="custoHora" placeholder="Custo hora">
                    </div>

                    <div class="form-group">
                        <label for="precoServico">Custo dia</label>
                        <input type="text" class="form-control" id="custoDia" name="custoDia" placeholder="Custo dia">
                    </div>

                    <div class="form-group">
                        <label for="precoServico">Custo semana</label>
                        <input type="text" class="form-control" id="custoSemana" name="custoSemana" placeholder="Custo semana">
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
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


      <?php require("../template/footer.php"); ?>
