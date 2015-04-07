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
			--><li><a href="pag1.1.html">Accueil</a></li><!--
			--><li><a href="pageInscription.php">Inscription</a></li><!--
			--><li><a href="aPropos.html">A propos</a></li><!--
			--><li><a href="#">Contact</a></li><!--
			--><li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>
		
			<div id="contenu">
			<br>
				<form method="post" action="inscription.php"> <!--formulaire d'identification user-->
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
					</center>
					</div>
				</form>
			</div>
			<div id="piedpage"> lien 2 </div>
	</body>
</html>