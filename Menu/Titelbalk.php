<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Style.css" />
        <title>ReMaS</title>
    </head>
    <body>
        <div class="titelBalk">
            <div class="content">
                <div class="left">
                    <img class="menuImage" src="https://www.recyclingmagazine.nl/wp-content/uploads/2019/03/dreams.metroeve_recycling-dreams-meaning.gif" alt="Recycling">
                    <a class="slogan">ReMaS Superior Waste Recycling</a>
                </div>
                <div class="right">
                    <div class="username">
                        <a class="versie">Versie 1.0</a>
                        <?php 
                            $username = $_SESSION["username"];
                            echo "Ingelogd als: ".$username;
                        ?>
                    </div>
                    <a  href="http://localhost/ReMaS/Modules/Uitloggen.php" class="">
                        <div class="tooltip">
                            <img class="logoutImage" src="https://icons.iconarchive.com/icons/graphicloads/100-flat-2/256/inside-logout-icon.png" alt="Logout">
                            <span class="tooltipText">Hier kunt u uitloggen</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>