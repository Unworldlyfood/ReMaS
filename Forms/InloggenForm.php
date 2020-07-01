<!-- Formulier voor het login (wordt aangeroepen door de login module) -->
<form class="form" action="" method="post">
    <div class="titelBalk">   
        <div class="content">
            <div class="left">
                  <img class="menuImage" src="https://www.recyclingmagazine.nl/wp-content/uploads/2019/03/dreams.metroeve_recycling-dreams-meaning.gif" alt="Recycling">
                  <a class="slogan">ReMaS Superior Waste Recycling</a>
            </div>
            <div class="right">
                <div class="username">
                    <a class="versie">Versie 1.0</a>
                </div>
                <a  href="http://localhost/ReMaS/Modules/Uitloggen.php" class="">
                <div class="tooltip">
                    <span class="tooltipText">Hier kunt u uitloggen</span>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="tekst">
            Welkom bij ReMaS, <br />
            het REcycle Management System voor het project <br />
            Superior Waste van de gemeente Emserveen<br /><br />
    </div>
    <label>Gebruiker:</br><input type="text" placeholder="Gebruikersnaam"name="User" value=""></label></br>
    <label>Wachtwoord:</br><input type="password" placeholder="Wachtwoord" name="Pass" value=""></label></br>
    <input type="submit" name="Inloggen" value="Inloggen">
</form>
