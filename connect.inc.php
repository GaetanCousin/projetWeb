<?php	// ce fichier fait la connection a la base de donnée
	$host = "localhost"; // la base de donnée est en local
	// Généralement la machine est localhost, c'est-a-dire la machine sur laquelle le script est hébergé
	$user = "root";
	$bdd = "projetweb";	// nom de la base de donnee à laquelle on se connecte
	$passwd = "";
	$co = mysql_connect($host , $user , $passwd)
	or die("erreur de connexion au serveur");
	mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
?>
