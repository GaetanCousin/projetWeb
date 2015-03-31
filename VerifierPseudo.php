<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
	</head>
<body>
	<?php
		include "connect.inc.php"; // le fichier qui fait la conexion a la base de donnee

		
		if(!isset($_GET['login']) && !isset($_GET['mdp']))
		{
			header('Location: pageInscription.html');	//si le mdp ou login n est pas trouve on dirige le internaut ver la page d inscription
			Exit;
			}
			else
			{

			}
	?>

</body>
// Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
$Requete ="Select PASSWORD('".$_SESSION['Password']."');";