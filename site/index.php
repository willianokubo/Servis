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

      <title>Servis</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/navbar-fixed-top.css" rel="stylesheet">
      <link href="css/sticky-footer-navbar.css" rel="stylesheet">
      <?php  
      /*esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
      session_start();
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
      {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.html');
        }

      $logado = $_SESSION['login'];
      ?>
    </head>

    <body>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="glyphicon glyphicon-user"></span>
              <p class="small">Menu</p>
            </button>
            <a class="navbar-brand" href="index.html">Servis</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href=""><?php echo 'Bem vindo, '.$logado; ?></a></li>
              <li><a href="sair.php">Sair</a></li>
            </ul>
          </div><!--/.nav-collapse -->
      </nav>

      <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <br><br><br><br><br>
        <div class="row">
          <div class="col-md-12">
          <h2 class="text-center">Encontre o serviço ideal pelo melhor preço!</h2>
          <br>
          <p>
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input type="text" class="form-control input-lg" list="servicos" name="servico" placeholder="Ex.: Fotógrafo...">
                    <datalist id="servicos">
                      <option value="Fotografo">
                      <option value="Pedreiro">
                      <option value="Eletricista">
                    </datalist>
                  <span class="input-group-btn">
                      <button onclick="window.location='busca.html'" class="btn btn-success input-lg" type="button">Procurar</button>
                  </span>
                </div><!-- /input-group -->
              </div><!-- /div col-->
            </div>
            </div><!-- /div col-->
            </div>
          </p>
        </div>
        </div>

      </div> <!-- /container -->

      <footer class="footer">
        <div class="container">
          <p class="text-muted">© 2017 Servis. Todos os direitos reservados</p>
        </div>
      </footer>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>');</script>
      <script src="js/bootstrap.min.js"></script>
    </body>
  </html>