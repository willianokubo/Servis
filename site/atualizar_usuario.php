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

$erro = 0; // Erro = false

$sql = "select * from usuario where email='$email';";

$result = mysqli_query($con, $sql);

 while($rs = mysqli_fetch_array($result)){ 
?>
 <br>
            <div class="col-md-6 col-md-offset-3">
              <form action="update_usuario.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomeCompleto">Nome Completo</label>
                        <input type="text" class="form-control" id="nomeCompleto" name="nome" value="<?=$rs['nome']?>" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$rs['email']?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$rs['endereco']?>" placeholder="endereço">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$rs['telefone']?>" onkeypress="formataTelefone(this, event)" onload="formataTelefone(this)" placeholder="Telefone" maxlength="15" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{4,5}$" >
                    </div>
                  
                  <div class="form-group">
                      <label for="img">Imagem de perfil</label>
                      <input type="file" id="img" name="img"> 
                      <p class="help-block">Escolha uma imagem de perfil.</p> 
                  </div>
                  
                  
                   <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha atual</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nova senha</label>
                                <input type="password" class="form-control" name="senha2" placeholder="Corfirmar senha">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$rs['id']?>">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </form>
            </div>

      <?php }
     require("template/footer.php"); 

    

    // >>Verificação de erros
    $erro = filter_input(INPUT_GET, 'erro');

      if ($erro == 1){
        echo '<script>confirm("Favor, digitar a senha atual para fazer a alteração da nova!"); </script>';

      }elseif($erro == 2){
          echo '<script>confirm("A nova senha deve ter mais de 8 caracteres")</script>';
      }elseif($erro == 3){
          echo '<script>confirm("Senha atual incorreta, favor digitar novamente!")</script>';
      }
          
      


?>
