<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body> 
	<div id="bandeau">	
		<div id="titre"> NEW FILM FR</div>	
	</div>
	
		<div id="p">
		</div>	
		<div id="menu">
			<ul id="nav"><!--
			--><li><a href="pag1.1.php">Accueil</a></li><!--
			--><li><a href="pageInscription.php">Inscription</a></li><!--
			--><li><a href="aPropos.html">A propos</a></li><!--
			--><li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>
		
			<div id="contenu">
			<br>
				<form method="post"> <!--formulaire d'identification user-->
					<div>
					<p>
						<label id="formulaire">Nom:</label>
						<input type="text" value="" name="nom" placeholder="Exemple" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Prenom:</label>
						<input type="test" name="prenom" placeholder="Exemple" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Mot de passe:</label>
						<input type="password" name="MPD" placeholder="Exemple" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Confirmer mot de passe:</label>
						<input type="password" name="repeteMPD" placeholder="Exemple" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Pseudo:</label>
						<input type="test" name="pseudo" placeholder="Exemple" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">E-mail:</label>
						<input type="e-mail" value="" name="e-mail" placeholder="exemple@exemple.com" id="identifiant"/>
					</p>
					<label id="formulaire">Je suis:</label>
					<input type="radio" value="Homme" name="sexe" id=""/>
					<label>Un homme</label>
					<input type="radio" value="Femme" name="sexe" id=""/>
					<label>Une femme</label>
					<br></br>
					<center>
						<input id="toto" type="submit"  value="Envoyer" name="submit"/>
					<br/>
					<br/>
					<br/>
					<?php
			if(isset($_POST['submit']))
		{
			$_POST['nom']=htmlentities(trim($_POST['nom']));				//recuperer la valeur (TRIM =enleve les espaces)
			$_POST['prenom'] =htmlentities(trim($_POST['prenom']));			//recuperer la valeur (HTMLENTITIES =ne permet pas de entre de script)
			$_POST['MPD'] =htmlentities(trim($_POST['MPD']));				//recuperer la valeur
			$_POST['repeteMPD']=htmlentities(trim($_POST['repeteMPD']));	//recuperer la valeur
			$_POST['e-mail'] =htmlentities(trim($_POST['e-mail']));			//recuperer la valeur
			$_POST['pseudo'] =htmlentities(trim($_POST['pseudo']));			//recuperer la valeur
			if (isset($_POST['sexe'])) {
				$_POST['sexe'] = htmlentities(trim($_POST['sexe']));		//recuperer la valeur
			}
				
				if($_POST['nom']&&$_POST['prenom']&&$_POST['MPD']&&$_POST['repeteMPD']&&$_POST['pseudo']&&$_POST['e-mail']&&isset($_POST['sexe']))  //verifie si les champs sont tous completes
				{
					if($_POST['MPD']==$_POST['repeteMPD'])  //verifie si le 2 mots de passes sont identique 
					{
						if(filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)==true){	
							include "connect.inc.php"; 			// le fichier qui fait la connexion a la base de donnee
							$reg=mysql_query("SELECT * FROM utilisateur WHERE email_utilisateur='".$_POST['e-mail']."'");  //verifi si l adresse e-mail existe deja
							$rows=mysql_num_rows($reg);			//compte le nr de ligns dans ma variable
							
							
							if($rows==0)						//on verifie si il y a une e-mail identic dans notre base
							{
								$query="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, civilite_utilisateur_, mot_de_passe_utilisateur, pseudo_utilisateur) 
										VALUES('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['e-mail']."','".$_POST['sexe']."',MD5('".$_POST['MPD']."'),'".$_POST['pseudo']."')";	//enregistre la requet
										mysql_query( $query );							// envoier la requet
										echo mysql_error();								// afficher si il y a des erreurs
										echo "Inscription  enregistree";
							} 
							else echo "Ce pseudo n'est pas disponible";
						}
						else echo "Veuliiez saisir une adresse mail valide";
					}
					else echo'Les deux mots des passes doivent etre identique';
				}
				else echo "Veuillez saisir tous les champs";
			}
			?>
					</center>
					</div>
				</form>
			</div>
			<div id="piedpage"></div>
	</body>
</html>