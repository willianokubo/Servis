<?php
if (isset($_COOKIE["email"])){
  $_SESSION["email"] = $_COOKIE["email"];
}
if(!isset($_SESSION["email"])){
    header("Location: index.php");
}
 
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$endereco = filter_input(INPUT_POST, 'endereco');
$telefone = filter_input(INPUT_POST, 'telefone'); //remove qualquer caracter não numerico
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');
$new_senha = filter_input(INPUT_POST, 'senha2');

$pass = sha1($senha);
$new_pass = sha1($new_senha);

require ("conexao.php");

if($senha == ""){
    
    if($new_senha == ""){
        $sql = "update usuario set nome = '$nome', endereco = '$endereco', telefone = '$telefone', email = '$email' where id= $id;";
        mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");
        header("Location: home.php?ok=1");
    }
    else{
        header("Location: atualizar_usuario.php?erro=1");
    }
    
}
else{
    if(strlen($new_senha) >= 8){
        
            $sql = "select senha from usuario where id = $id";
            $result = mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");

            while($rs = mysqli_fetch_array($result)){ 
                if($pass == $rs['senha']){
                    $sql = "update usuario set nome = '$nome', endereco = '$endereco', telefone = '$telefone', email = '$email', senha = '$new_pass' where id= $id;";
                    mysqli_query($con, $sql) or die ("Erro de sintaxe, verifique o codigo");
                    header("Location: home.php?ok=1");
                }
                else{
                    header("Location: atualizar_usuario.php?erro=3");
                }

             }
    }
    else{
        header("Location: atualizar_usuario.php?erro=2");
    }
}

session_start();
$_SESSION["email"] = $email;
setcookie("email", $email, time()+60*60);




?>
