<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
	 <link rel="stylesheet" type="text/css" href="pag1.1.css">
	</head>
	
	<body> 

	<div id="bandeau">	
		<div id="titre"> NEW FILM FR</div>	
		
	</div>
		<div id="d">
			<?php
				session_start();
				if($_SESSION['login'])
				{
					echo "Bienvenue:  ".$_SESSION['login'];
					echo "<br/><br/><a href='deconnecte.php'>Se deconnecter</a>";
				}else header('Location:pag1.1.html');
			?>
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
			--><li><a href="#">A propos</a></li><!--
			--><li><a href="#">Contact</a></li><!--
			--><li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>
		
			<div id="contenu">
			
			</div>
			<div id="piedpage"> lien 2 </div>
	</body>
</html>
