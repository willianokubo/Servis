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
$error[] = "";

$pass = sha1($senha);
$new_pass = sha1($new_senha);

require ("conexao.php");

//Recenbendo arquivo
	$img_perfil=$_FILES['img'];
			
	//Se a img_perfil selecionada
	if (!empty($img_perfil["name"]))
	{
		//Tamanho máximo do arquivo em bytes
		
		$tamanho = 3000000;

		//Verifica se o arquivo é uma imagem
		if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$img_perfil["type"]))
		{
			$error[]="Isto nao e uma imagem";
		}
	}
	
	if ($img_perfil["size"] > $tamanho)
	{
		$error[]= "A imagem deve ter no maximo 3 mb";
	}

	//Se nao ouver nenhum erro
	if (count($error)==1 && !empty($img_perfil["name"]))
	{
		//Pega a exteção do arquivo
		preg_match("/\.(gif|bmp|png|jpeg|jpg){1}$/i",$img_perfil["name"],$ext);

		//Gera um nome unico para a imagem
		$nome_perfil = time()."_".rand(1,50000).".".$ext[1];

		//Caminho onde ficara imagem
		$caminho_img_perfil="img/img_perfil/".$nome_perfil;

		move_uploaded_file($img_perfil["tmp_name"],$caminho_img_perfil);
	}

	elseif (empty($img_perfil["name"])) {
		$sql_deletar = "select * from usuario where email = '$email';";
		$delete_img_perfil = mysqli_query($con, $sql_deletar);
		$valor = mysqli_fetch_array($delete_img_perfil);
		$nome_perfil = $valor["img_perfil"];
	}
     
	else
	{
		foreach($error as $erro)
		{
			echo $erro."<br />";
		}
    }

    //Insere os dados no banco

$sql_deletar = "select * from usuario where email = '$email';";
$delete_img = mysqli_query($con, $sql_deletar) or die (mysql_error());
$valor = mysqli_fetch_array($delete_img);

if($nome_perfil != $valor["img_perfil"])
{
	if($valor["img_perfil"] == "no_user_icon.png"){
	}
	else{
	unlink("img/img_perfil/".$valor["img_perfil"]);
}
}

if($senha == ""){
    
    if($new_senha == ""){
        $sql = "update usuario set nome = '$nome', endereco = '$endereco', telefone = '$telefone', email = '$email', img_perfil='$nome_perfil' where id= $id;";
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
                    $sql = "update usuario set nome = '$nome', endereco = '$endereco', telefone = '$telefone', email = '$email', senha = '$new_pass', img_perfil='$nome_perfil' where id= $id;";
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
    
    
mysql_close($con);

?>











?>
