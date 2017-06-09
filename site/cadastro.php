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
                        <input type="text" class="form-control" id="telefone" name="telefone" onkeypress="formataTelefone(this, event)" placeholder="Telefone">
                    </div>


                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>


<?php 

require("template/footer.php"); ?>
