<?php
$con = mysql_connect("localhost:3306", "root", "") or die ("Falha ao se conectar");
$db = mysql_select_db("servis", $con) or die ("Falha ao se conectar ao banco");
?>
