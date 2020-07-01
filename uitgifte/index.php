<?php
    session_start();
    require('../Configuratie.php');
    require('../Modules/Functies.php');
    $pdo = ConnectDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Style.css" />
        <title>ReMaS</title>
    </head>
    <header>
        <?php
        // Logincheck, als je niet ingelogd bent dan komt alleen het inlogscherm te zien. als je wel bent ingelogd laat hij het menu zien.
            if (LoginCheck($pdo)==false) {
                require("../Modules/Inloggen.php");
            }else{
                require("../Menu/Titelbalk.php");
            }
        ?>
    </header>
    <body>
    <?php
                //Roept de levelcheck functie aan
                if (levelCheck($pdo)==true) {
                        //Als de levelcheck succesvol is afgerond word de menu-functie aangeroepen
                        menu();
                }
            ?>
    </body>
</html>