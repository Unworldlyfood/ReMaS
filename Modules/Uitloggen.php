<?php
// Unset session var
        $_SESSION = array();

        // ophalen session parameters
        $params = session_get_cookie_params();

        // verwijderen van sessie cookie
        setcookie(session_name(),
                '', time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]);

        // Header refresh naar inlogscherm
?>      
<link rel="stylesheet" type="text/css" href="../Style.css" />
<div class="melding">
        <?php
                echo "U bent succesvol uitgelogd ";
                header("refresh: 0; URL=../index.php");
        ?>
</div>



