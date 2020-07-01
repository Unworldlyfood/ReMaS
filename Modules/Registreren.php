<?php
 	if (LoginCheck($pdo)==true) {
		$level = $_SESSION["level"];
		if ($level == 6){
			//init fields
			$name =  $email = $username = 	$password = $retypepassword = NULL;

			//init error fields
			$nameerr = $mailerr = $usererr = $paserr = $repasserr = NULL;

			if(isset($_POST['Registreren']))
			{
				$checkonerrors = false; // hulpvariabele voor het valideren van het formulier
				/*
				Lees alle gegevens uit het formulier uit middels de POST methode
				*/
				$name = $_POST['Name'];
				$email = $_POST['Email'];
				$username = $_POST['Username'];
				$password = $_POST['Password'];
				$retypepassword = $_POST['RetypePassword'];


				//BEGIN CONTROLES

				//controleer het voornaam veld
				if (empty($name)) {
					$fnameerr = "Voornaam is verreist.";
					$checkonerrors = true;
				}
				if (is_Char_Only($name)==FALSE) {
					$fnameerr = "Alleen leters zijn in dit vlak toegestaan is verreist.";
					$checkonerrors = true;
				}
				if (is_minlength($name, 2)==FALSE) {
					$fnameerr = "u moet minimaal 2 letters invoeren";
					$checkonerrors = true;
				}
				//controleer het email veld
				if (empty($email)) {
					$mailerr = "Email is verreist.";
					$checkonerrors = true;
				}
				if (is_email($email)==FALSE) {
					$mailerr = "Voer geldig mail adres in AUB";
					$checkonerrors = true;
				}
				//controleer het username veld
				if (empty($username)) {
					$usererr = "Gebruikersnaam is verreist.";
					$checkonerrors = true;
				}
				//controleer het paswoord veld
				if (empty($password)) {
					$paserr = "wachtwoord is verreist.";
					$checkonerrors = true;
				}
				if (is_minlength($password, 6)==FALSE) {
					$paserr = "u moet minimaal 6 letters invoeren";
					$checkonerrors = true;
				}

				//controleer het retype paswoord veld

				if ($retypepassword!=$password) {
					$paserr= "Het 2de wachtwoord klopt niet";
					$repasserr= "Het 2de wachtwoord klopt niet";
					$checkonerrors = true;
				}
				if (empty($retypepassword)) {
					$repasserr = "wachtwoord is verreist.";
					$checkonerrors = true;
				}
				if (is_minlength($retypepassword, 6)==FALSE) {
					$repasserr = "u moet minimaal 6 letters invoeren";
					$checkonerrors = true;
					}
				//EINDE CONTROLES

				if($checkonerrors==true) 
				{
					require('../Forms/RegistrerenForm.php');

				}
				else
				{
					//formulier is succesvol gevalideerd
					//maak unieke salt
					$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
					//hash het paswoord met de Salt
					$password = hash('sha512', $password . $salt);
					$parameters = array(':naam' =>$name,
															':naam' =>$name,
															':email' =>$email,
															':unaam' =>$username,
															':wachtwoord' =>$password,
															':salt' =>$salt,
															':level' =>1
					);
					$sth = $pdo->prepare('INSERT INTO Medewerkers (Naam, Wachtwoord, Salt, Email, Inlognaam,  Level)
																							VALUES(:naam, :wachtwoord, :salt, :email, :unaam,  :level)');
					$sth ->execute($parameters);
					echo "U heeft zich succesvol geregistreerd en kunt vanaf nu inloggen op de website";
					echo "<br/>";
					echo "U wordt binnen 5 seconden doorgestuurd naar de hoofdpagina";
					header("Refresh: 5; URL=./index.php");
				}
			}
			else
			{
				require('../Forms/RegistrerenForm.php');
			}
		}
	}else{
		echo"U dient eerst in te loggen.";
	}
?>
