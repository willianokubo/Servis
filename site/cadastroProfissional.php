            <?php
            $nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto');
            $endereco = filter_input(INPUT_POST, 'endereco');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $email = filter_input(INPUT_POST, 'email');
            $senha = filter_input(INPUT_POST, 'senha');
            $idServico = filter_input(INPUT_POST, 'tipoServico');

            $link = mysqli_connect('127.0.0.1', 'root', '', 'mydb');
            if (!$link) {
                die('Não foi possível conectar: ' . mysql_error());
            }
            else{
            echo 'Conexão bem sucedida';

            $sql = "INSERT INTO funcionario(nomeFuncionario, enderecoFuncionario, telefoneFunc, emailFunc, senhaFunc, Servico_idServico, Classificacao, status)
            VALUES ('$nomeCompleto', '$endereco','$telefone', '$email', '$senha', 1, 1, 'Sem servico')";

            if (mysqli_query($link, $sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $link->error;
            }

        }
        // session_start inicia a sessão
        session_start();

        // A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
        $result = mysqli_query($link,"SELECT * FROM `FUNCIONARIO` WHERE `EMAILFUNC` = '$email' AND `SENHAFUNC`= '$senha'");
        /* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
        if(mysqli_num_rows($result) > 0 )
        {
        $_SESSION['login'] = $email;
        $_SESSION['senha'] = $senha;
        header('location: index.php');
        }
        else{
          unset ($_SESSION['login']);
          unset ($_SESSION['senha']);
          header('location: index.php');
        mysqli_close($link);
        }      
      ?>