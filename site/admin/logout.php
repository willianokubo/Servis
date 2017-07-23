<?php
session_start();
session_destroy();
unset ($_SESSION['email_admin']);
session_destroy();
setcookie("email_admin", "", time()-99999999999999999999999999999999999999999999999999999999999999999999999999999999999999990);
header("Location: index.php");
?>
