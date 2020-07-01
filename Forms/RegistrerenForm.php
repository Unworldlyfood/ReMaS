<!-- Formulier voor het registreren (wordt aangeroepen door de registreer module) -->
<form class="form" name="RegistratieFormulier" action="" method="post">
	<?php
		require("../Menu/Titelbalk.php");
		menu();
    ?>
	<label for="Name">Voornaam:</label>
	<input type="text" id="Name" name="Name" value="<?php echo $name; ?>"/><?php echo $nameerr; ?>
	<br />
	<label for="Email">E-mail:</label>
	<input type="text" id="Email" name="Email" value="<?php echo $email; ?>" /><?php echo $mailerr; ?>
	<br />
	<label for="Username">Gewenste Gebruikersnaam:</label>
	<input type="text" id="Username" name="Username" value="<?php echo $username; ?>" /><?php echo $usererr; ?>
	<br />
	<label for="Password">Wachtwoord:</label>
	<input type="password" id="Password" name="Password" /><?php echo $paserr; ?>
	<br />
	<label for="RetypePassword">Herhaal Wachtwoord:</label>
	<input type="password" id="RetypePassword" name="RetypePassword" /><?php echo $repasserr; ?>
	<br />
	<input type="submit" name="Registreren" value="Registreer!" />
</form>