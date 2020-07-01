<?php
  function ConnectDB()
      {
          try {
              $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PASSWORD);
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
          return $pdo;
      }

  /** De functie RedirectNaarPagina
    * optionele parameter paginanr. Hiermee kun je de gebruiker naar iedere gewenste pagina doorsturen*/

  function RedirectNaarPagina($seconds = NULL,$paginanr = NULL)
      {
          if(!empty($seconds))
              $refresh = 'refresh: '.$seconds.';URL=';
          else
              $refresh = 'location:';

          if(!isset($paginanr))
          {
              echo "<br />U wordt binnen ".$seconds." seconden doorgestuurd naar de hoofdpagina.";
              header($refresh . "index.php");
          }
          else
              header($refresh . "index.php?paginanr=".$paginanr);
      }

  /** De functie LoginCheck
* controleert of de gebruiker is ingelogd*/

  function LoginCheck($pdo)
      {
            // Controleren of Sessie variabelen bestaan
          if (isset($_SESSION['user_id'], $_SESSION['username'],$_SESSION['login_string']))
          {
              $id = $_SESSION['user_id'];
              $loginstring = $_SESSION['login_string'];
              $username = $_SESSION['username'];
              // Get the user-agent string of the user.
              $userbrowser = $_SERVER['HTTP_USER_AGENT'];
              $parameters = array(':ID'=>$id);
              $sth = $pdo->prepare('SELECT Wachtwoord FROM medewerkers WHERE ID = :ID LIMIT 1');
              $sth->execute($parameters);

              if ($sth->rowCount() == 1)
                  {
                      // Variabelen inlezen uit query
                      $row = $sth->fetch();
                      //check maken
                      $logincheck = hash('sha512', $row['Wachtwoord'] . $userbrowser);
                        //controleren of check overeenkomt met sessie
                        if ($logincheck == $loginstring)
                            return true;
                                  else
                                      return false;
                  } else
                      return false;
          } else
                  return false;
      }
      
    // Functie om de waarde van de rol in de sessie te zetten.
    function levelCheck($pdo)
    {
        if (isset($_SESSION['level']))
          {
              $level =  $_SESSION['level'];
              $parameters = array(':LEVEL'=>$level);
              $sth = $pdo->prepare('SELECT Waarde FROM rollen WHERE ID = :LEVEL');
              $sth->execute($parameters);
              $waarde = $sth->fetch();
              $_SESSION['waarde'] = $waarde['Waarde'];
              return true;

          } else
          return false;
    }
    
    //functie om met de waarde uit de sessie te controleren welke items wel en niet weergeven mogen worden.
    function menu()
    {
        ?>
        <div class="menu">
        <a class="menuItem" href="http://localhost/ReMaS/index.php"><div class="tooltip">Home
        <span class="tooltipText">Hier vind je de homepagina</span></div></a>
        <?php
        $waarde = $_SESSION["waarde"];
        $one = "1";
        $pos = 0;
        //forloop om voor elke cijferpositie te kijken of het een 1 of 0 is.
        for ($x = 0; $x <= $pos; $x++) {
            $pos = strpos($waarde, $one, $pos);
            if ($pos !== false)  {
                //als er een 1 staat dan word het menu item getoond voor de desbetreffende positie in de cijferreeks.
                        if ($pos == 0){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/inname/index.php"><div class="tooltip">Inname
                                    <span class="tooltipText">Hier vind je de inname pagina</span></div></a>
                                <?php
                        }elseif ($pos == 1){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/verwerking/index.php"><div class="tooltip">Verwerking
                                    <span class="tooltipText">Hier vind je de verwerking pagina</span></div></a>
                                <?php
                        }elseif ($pos == 2){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/uitgifte/index.php"><div class="tooltip">Uitgifte
                                    <span class="tooltipText">Hier vind je de uitgifte pagina</span></div></a>
                                <?php
                        }elseif ($pos == 3){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/rapportage/index.php"><div class="tooltip">Rapportage
                                    <span class="tooltipText">Hier vind je de rapportage pagina</span></div></a>
                                <?php
                        }elseif ($pos == 4){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/onderhoud/index.php"><div class="tooltip">Onderhoud
                                    <span class="tooltipText">Hier vind je de onderhoud pagina</span></div></a>
                                <?php
                        }elseif ($pos == 5){
                                ?>
                                    <a class="menuItem" href="http://localhost/ReMaS/gebruikersbeheer/index.php"><div class="tooltip">Gebruikersbeheer
                                    <span class="tooltipText">Hier kunt nieuwe gebruikers aanmaken</span></div></a>
                                <?php
                        }
                }
            $pos++;
        } 
        ?>               
            <a class="menuItem" href="http://localhost/ReMaS/Modules/Uitloggen.php"><div class="tooltip">Uitloggen
            <span class="tooltipText">Hier kunt u uitloggen</span></div></a>
            </div>
        <?php
    }

  /* Functies voor validatie van Form Fields */
  /** Controleert een email adres op geldigheid* @return  boolean*/

    function is_email($invoer)
        {
            return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",$invoer));
        }

    /** Controleert of een string aan de minimum lengte voldoet* @return  boolean*/

    function is_minlength($invoer, $minlengte)
        {
            return (strlen($invoer) >= (int)$minlengte);
        }

  /** Controleert of invoer alleen uit letters bestaat* @return  boolean*/

    function is_Char_Only($invoer)
        {
            return (bool)(preg_match("/^[a-zA-Z ]*$/", $invoer)) ;
        }

    function test($invoer)
        {
          return $invoer ;
        }
?>

