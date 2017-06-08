<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$pass = sha1($senha);
$cookie = $_POST["cookie"];
$expire=time()+60*60*24;

require ("conexao.php");

$sql = "select email from usuario where email = '$email' and senha = '$pass';";
$rs = mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

if (mysqli_num_rows($rs) == 1){

  session_start();
  $_SESSION["email"] = $email;
  if($cookie)
  {
    setcookie("email", $email, $expire);
  }
  else{
    setcookie("email", $email, time()+60*60);
  }
  header("Location: home.php");


}
else{
  header("Location: index.php?erro=1");
}
?>
