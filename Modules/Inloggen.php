<?php
function login($username, $password, $pdo)
{
	/*
	een prepared statement waarbij je de gegevens van de medewerker ophaalt
	*/
	$parameters = array(':username' =>$username);
	$sth = $pdo->prepare('SELECT * FROM medewerkers WHERE Inlognaam=:username');
	$sth ->execute($parameters);

	//wordt uitgevoerd als er maar een rij is
	if ($sth->rowCount() == 1)
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();

		//encrypt het ingevoerde wachtwoord
		$password = hash('sha512', $password . $row['Salt']);

		//wordt uitgevoerd als het ingevoerde wachtwoord gelijk is aan het opgeslagen wachtwoord
		if ($row['Wachtwoord'] == $password)
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			$_SESSION['user_id'] = $row['ID'];
			$_SESSION['username'] = $row['Inlognaam'];
			$_SESSION['level'] = $row['Level'];
			$_SESSION['login_string'] = hash('sha512',
			$password . $user_browser);

			// Login successful.
			?>      
				<link rel="stylesheet" type="text/css" href="../Style.css" />
				<div class="melding">
			<?php
			echo "Login successful<br/>";
			echo "Welkom ".$username;
			header("refresh: 0; URL=./index.php");
			return true;
			?>
			</div>
			<?php
		 }
		 else
		 {
			// password incorrect
			echo "Verkeerd wachtwoord ingevoerd";
			header("refresh: 3; URL=./index.php");
			return false;
		 }
	}
	else
	{
		// username bestaat niet
		echo "username bestaat niet";
		header("refresh: 3; URL=./index.php");
		return false;
	}
}

//het knopje inloggen van het formulier is ingedrukt.
if(isset($_POST['Inloggen']))
{
	$username=$_POST['User'];
	$password=$_POST['Pass'];

	login($username, $password, $pdo);


}
else
{
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./Forms/InloggenForm.php');
}
?>
