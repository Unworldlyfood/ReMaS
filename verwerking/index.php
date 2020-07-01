<?php
    session_start();
    require('../Configuratie.php');
    require('../Modules/Functies.php');
    $pdo = ConnectDB();
?>
<!DOCTYPE html>
<html>
    <head >
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
        <script language="javascript">
            //script om alleen de specifieke div te laten printen
            function printdiv(printpage){
                var headstr = "<html><head><title></title></head><body>";
                var footstr = "</body>";
                var newstr = document.all.item(printpage).innerHTML;
                var oldstr = document.body.innerHTML;
                document.body.innerHTML = headstr+newstr+footstr;
                window.print();
                document.body.innerHTML = oldstr;
                return false;
            }
        </script>
        <div id="div_print" class="schema">
            <table class="table" >
                <thead class="" style="background-color: #ff9623;">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">aparaten</th>
                    <th scope="col">omschrijving</th>
                    <th scope="col">Gewicht in gram</th>
                    <th scope="col">vergoeding</th>
                    <th scope="col"><input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" Print "></th>
                    </tr>
                </thead>
                    <?php
                        //voor het ophalen van alle scholen
                        $sth = $pdo->prepare('SELECT * from apparaten');
                        $sth ->execute();
                        while ($row = $sth->fetch()) {
                     ?>
                <tr>
                    <td scope="col" style="background-color: #ff9623;"></td>
                    <td scope="col"><?php echo $row['Naam']; ?></td>
                    <td scope="col"><?php echo $row['Omschrijving']; ?></td>
                    <td scope="col"><?php echo $row['GewichtGram']; ?></td>
                    <td scope="col">€<?php echo $row['Vergoeding']; ?></td>
                    <td scope="col"><a href="index.php?p=aparaten&bekijken=<?php echo $row['ID'];?>">bekijken</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
<!-- 
    Verwerking:
        -Aparaat samenstelling tonen
        -Onderdelen
            -Toevoegen
            -Verwijderen
            -Gewicht % wijzigen
        -verwerking opslaan
        -afdrukken 
-->
