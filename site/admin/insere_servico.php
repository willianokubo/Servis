<?php
if(isset($_COOKIE["email_admin"])){
  $_SESSION["email_admin"] = $_COOKIE["email_admin"];
}
if (!isset($_SESSION["email_admin"])){
  header("Location: index.php");
}

$email = $_SESSION["email_admin"];
require("../template/header.php");
require("../template/nav.php");
?>


            <br>
            <div class="col-md-6 col-md-offset-3">
                <h2>Adicionar serviço</h2>
                <form action="create_servico.php" method="post">
                    <div class="form-group">
                        <label for="nomeServico">Nome do Serviço</label>
                        <input type="text" class="form-control" id="nomeServico" name="nome" placeholder="Nome Servico">
                    </div>
                    <div class="form-group">
                        <label for="Categoria">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria">
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="custo_hora">Custo Hora</label>
                            <input type="custo_hora" class="form-control" name="custo_hora" placeholder="custo hora">
                        </div>
                        <div class="col-md-4">
                            <label for="custo_dia">Custo Dia</label>
                            <input type="text" class="form-control" id="custo_dia" name="custo_dia" placeholder="custo dia">
                        </div>
                        <div class="col-md-4">
                            <label for="custo_dia">Custo Semana</label>
                            <input type="text" class="form-control" id="custo_semana" name="custo_semana" placeholder="custo semana">
                        </div>
                    </div>
                    </div>

                    <input  type="hidden" name="id" value=" <?=$id?>">
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </form>
            </div>


      <?php
require("../template/footer.php"); ?>
