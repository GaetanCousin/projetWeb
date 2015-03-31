<?php	//cet fichier fait la conexion a la base de donnee
	$host = "localhost";		//la base de donnee est en local
	// Généralement la machine est localhost
	// c'est-a-dire la machine sur laquelle le script est hébergé
	$user = "root";
	$bdd = "projet";	//nom de la base de done ou on se connect
	$passwd = "";
	$co = mysql_connect($host , $user , $passwd)
	or die("erreur de connexion au serveur");
	mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
?>
