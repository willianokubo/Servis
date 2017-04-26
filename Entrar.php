<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = filter_input(INPUT_POST, 'login');
$senha = filter_input(INPUT_POST, 'senha');
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$link = mysqli_connect('127.0.0.1', 'root', '', 'mydb');
            if (!$link) {
                die('Não foi possível conectar: ' . mysql_error());
            }
            else{
            echo 'Conexão bem sucedida';
       		}

// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($link,"SELECT * FROM 'FUNCIONARIO' WHERE 'EMAILFUNC' = '$login' AND 'SENHAFUNC'= '$senha'");
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location: index.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location: index.html');
	mysqli_close($link);
	}
?>