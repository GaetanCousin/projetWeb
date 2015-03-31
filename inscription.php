
<?php
			if(isset($_POST['submit']))
		{
			$_POST['nom']=htmlentities(trim($_POST['nom']));			//recuperer la valeur (TRIM =enleve les espaces)
			$_POST['prenom'] =htmlentities(trim($_POST['prenom']));		//recuperer la valeur (HTMLENTITIES =ne permet pas de entre de script)
			$_POST['MPD'] =htmlentities(trim($_POST['MPD']));			//recuperer la valeur
			$_POST['repeteMPD']=htmlentities(trim($_POST['repeteMPD']));	//recuperer la valeur
			$_POST['e-mail'] =htmlentities(trim($_POST['e-mail']));		//recuperer la valeur
			if (isset($_POST['sexe'])) {
				$_POST['sexe'] = htmlentities(trim($_POST['sexe']));			//recuperer la valeur
			}
				
				if($_POST['nom']&&$_POST['prenom']&&$_POST['MPD']&&$_POST['repeteMPD']&&isset($_POST['sexe']))  //verifie si les champs sont tous completes
				{
					if($_POST['MPD']==$_POST['repeteMPD'])  //verifie si le 2 mots de passes sont identique 
					{
						include "connect.inc.php"; // le fichier qui fait la connexion a la base de donnee
						$reg=mysql_query("SELECT * FROM utilisateur WHERE email_utilisateur='".$_POST['e-mail']."'");  //verifi si l adresse mail existe deja
						$rows=mysql_num_rows($reg);		//compte le nr de ligns dans ma variable
						echo "<br></br>".$rows;
						if($rows==0)					//on verifie si il y a une e-mail identic dans notre base
						{
							$query="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, civilite_utilisateur_, mot_de_passe_utilisateur) 
									VALUES('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['e-mail']."','".$_POST['sexe']."',MD5('".$_POST['MPD']."'))";	//enregistre la requet
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
