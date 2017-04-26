<?php          
		unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        session_destroy();
        header('location: index.html');
?>