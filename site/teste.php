<?php
if (isset($_GET["pass"])){
    echo '<script>confirm("Senha alterada com sucesso!");</script>';
  }
require("template/header.php");
require("template/nav_index.php");
require("template/footer.php");
?>
