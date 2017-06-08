<?php
$con = mysqli_connect("localhost:3306", "root", "") or die ("Falha ao se conectar");
$db = mysqli_select_db($con, "servis") or die ("Falha ao se conectar ao banco");
?>
