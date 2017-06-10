<?php

$erro = filter_input(INPUT_GET, 'erro');

if ($erro == 2){
    echo '<script>confirm("E-mail ou senha invalidos");</script>';
}
elseif ($erro == 1){
    echo '<script>confirm("Digite uma senha com mais de 8 caracteres");</script>';
}
elseif ($erro == 3){
    echo '<script>confirm("E-mail já cadastrado");</script>';
}
elseif ($erro == 4){
    echo '<script>confirm("Senhas diferentes! Favor, digitar novamente.");</script>';
}


if(isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
}
if (isset($_SESSION["email"])){
  header("Location: home.php");
}

$senha = filter_input(INPUT_POST, 'senha');
$senha2 = filter_input(INPUT_POST, 'senha2');

require("template/header.php");
require("template/nav_index.php");
?>


            <br>
            <div class="col-md-6 col-md-offset-3">
                <h2>Crie uma conta</h2>
                <form action="join.php" method="post">
                    <div class="form-group">
                        <label for="nomeCompleto">Nome Completo</label>
                        <input type="text" class="form-control" id="nomeCompleto" name="nome" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmar senha</label>
                                <input type="password" class="form-control" name="senha2" placeholder="Corfirmar senha">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="endereço">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" onkeypress="formataTelefone(this, event)" placeholder="Telefone" maxlength="15">
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


<?php 

require("template/footer.php"); ?>
