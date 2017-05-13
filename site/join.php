<?php
$nome = filter_input(INPUT_POST, 'nome');
$endereco = filter_input(INPUT_POST, 'endereco');
$telefone = preg_replace("/\D+/", "", filter_input(INPUT_POST, 'telefone')); //remove qualquer caracter não numerico
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$senha2 = filter_input(INPUT_POST, 'senha2');
$pass = sha1($senha);

$expire=time()+60*60*24;

require ("conexao.php");
$sql = mysql_query("select * from usuario where email = '$email';");
$numRegistros = mysql_num_rows($sql);
if($numRegistros == 0){
  if(filter_var($email, FILTER_VALIDATE_EMAIL) && empty(!$senha)){
    if(strlen($senha) >= 8){
      $sql = "insert into usuario (nome, endereco, telefone, email, senha) values ('$nome', '$endereco', '$telefone', '$email', '$pass')";
      mysql_query($sql, $con) or die ("Erro de sintaxe, verifique o codigo");

      session_start();
      $_SESSION["email"] = $email;
      setcookie("email", $email, $expire);

      echo '
      <!DOCTYPE html>
      <html lang="en">
      <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <meta http-equiv="refresh" content="3; url=home.php">

      <title>Servis</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/navbar-fixed-top.css" rel="stylesheet">
      <link href="css/sticky-footer-navbar.css" rel="stylesheet">
      </head>

      <body>
      <div class="container">
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Servis</h4>
            </div>
            <div class="modal-body">
              <h3>Cadastro realizado com sucesso!</h3>
            </div>
            <div class="modal-footer">
              Obrigado =)
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      ';
      require("template/footer.php");
      echo "<script>
      $('#myModal').modal('show')
      </script>";
    }
    else{
      header("Location: cadastro.php?error=1");
    }
  }
  else {

    header("Location: cadastro.php?error=1");
  }
}
else
header("Location: cadastro.php?errore=1");

?>
