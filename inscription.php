
<?php
			if(isset($_POST['submit']))
		{
			$n=htmlentities(trim($_POST['nom']));			//recuperer la valeur (TRIM =enleve les espaces)
			$p =htmlentities(trim($_POST['prenom']));		//recuperer la valeur (HTMLENTITIES =ne permet pas de entre de script)
			$m =htmlentities(trim($_POST['MPD']));			//recuperer la valeur
			$rm=htmlentities(trim($_POST['repeteMPD']));	//recuperer la valeur
			$e =htmlentities(trim($_POST['e-mail']));		//recuperer la valeur
			$c =htmlentities(trim($_POST['sexe']));			//recuperer la valeur
				
				if($n&&$p&&$m&&$rm&&$c)  //perifie si les champs sont tous completes
				{
					if($m==$rm)  //verifie si le 2 mots de passes sont identique 
					{
						$m=md5($m);					//cryptage du mot de passe en mode md5
						include "connect.inc.php"; // le fichier qui fait la connexion a la base de donnee
						$reg=mysql_query("SELECT * FROM utilisateur WHERE email_utilisateur='$e'");  //verifi si l adresse mail existe deja
						$rows=mysql_num_rows($reg);		//compte le nr de ligns dans ma variable
						echo "<br></br>".$rows;
						if($rows==0)					//on verifie si il y a une e-mail identic dans notre base
						{
							$query="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, civilite_utilisateur_, mot_de_passe_utilisateur) 
									VALUES('$n','$p','$e','$c','$m')";				//enregistre la requet
									mysql_query( $query );							// envoier la requet
									echo mysql_error();								// afficher si il y a des erreurs
						} 
						else echo"Ce pseudo n'est pas disponible";
					}
					else echo'Les deux mots des passes doivent etre identique';
				}
				else echo"Veuillez saisir tous les champs";
		}
		?>
