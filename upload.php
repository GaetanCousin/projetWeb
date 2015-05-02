<?php
	//Connection à la base de données
		include "connect.inc.php";	

	// Recherche sur les films
		$RechFilm = mysql_query("SELECT id_film, titre_film, affiche_film
									FROM film where id_film>1168");

	// Récupération des images à l'URL
		while ($Film = mysql_fetch_assoc($RechFilm)){
			$Image = $Film['id_film'].'.'.substr($Film['affiche_film'],-3,3);
			file_put_contents('images/'.$Image ,file_get_contents($Film['affiche_film']));
			/*$MajFilm = mysql_query("UPDATE Film
										SET image_film = '".$Image."'
										WHERE id_film = '".$Film['id_film']."'");*/
		}   
?>