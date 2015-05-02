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
		
			<form id="recherche" action="" method="post">
			     <label for="recherche-texte"><input id="recherche-texte" name="q" placeholder="recherche" value="" title="recherche" type="text" onfocus="if(value=='recherche') this.value='';" /></label>
				 <input value="OK" name="recherche-submit" id="recherche-submit" type="submit" class="awesome" />
			</form>
	
		<div id="menu">
			<ul id="nav"><!--
			--><li><a href="pag1.1.php">Accueil</a></li><!--
			--><li><a href="pageInscription.php">Inscription</a></li><!--
			--><li><a href="aPropos.html">A propos</a></li><!--
			--><li><a href="#">Contact</a></li><!--
			--><li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>
		
			<div id="contenu">
			<br>
				<form method="post"> <!--formulaire d'identification user-->
					<div>
					<p>
						<label id="formulaire">Nom:</label>
						<input type="text" value="" name="nom" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Prenom:</label>
						<input type="test" name="prenom" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Mot de passe:</label>
						<input type="password" name="MPD" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">Confirmer mot de passe:</label>
						<input type="password" name="repeteMPD" id="identifiant"/>
					</p>
					<p>
						<label id="formulaire">E-mail:</label>
						<input type="test" value="" name="e-mail" id="identifiant"/>
					</p>
					<label id="formulaire">Sexe:</label>
					<input type="radio" value="Homme" name="sexe" id=""/>
					<label>Homme</label>
					<input type="radio" value="Femme" name="sexe" id=""/>
					<label>Femme</label>
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
			if (isset($_POST['sexe'])) {
				$_POST['sexe'] = htmlentities(trim($_POST['sexe']));		//recuperer la valeur
			}
				
				if($_POST['nom']&&$_POST['prenom']&&$_POST['MPD']&&$_POST['repeteMPD']&&isset($_POST['sexe']))  //verifie si les champs sont tous completes
				{
					if($_POST['MPD']==$_POST['repeteMPD'])  //verifie si le 2 mots de passes sont identique 
					{
						include "connect.inc.php"; 			// le fichier qui fait la connexion a la base de donnee
						$reg=mysql_query("SELECT * FROM utilisateur WHERE email_utilisateur='".$_POST['e-mail']."'");  //verifi si l adresse mail existe deja
						$rows=mysql_num_rows($reg);			//compte le nr de ligns dans ma variable
						
						
						if($rows==0)						//on verifie si il y a une e-mail identic dans notre base
						{
							$query="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, civilite_utilisateur_, mot_de_passe_utilisateur) 
									VALUES('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['e-mail']."','".$_POST['sexe']."',MD5('".$_POST['MPD']."'))";	//enregistre la requet
									mysql_query( $query );							// envoier la requet
									echo mysql_error();								// afficher si il y a des erreurs
									echo "Inscription  enregistree";
						} 
						else echo "Ce pseudo n'est pas disponible";
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
			<div id="piedpage"> lien 2 </div>
	</body>
</html>