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
		<centre>
		<div id="contenu">
		<?php
		session_start();
		if(isset($_POST['submit'])){
			$login=htmlentities(trim($_POST['login']));
			$mdp=htmlentities(trim($_POST['mdp']));
			if($mdp&&$login)
			{
				$mdp=md5($mdp);
				$connect=mysql_connect('localhost','root','');
				mysql_select_db('projetweb');
				$query=mysql_query("select * from utilisateur WHERE email_utilisateur='$login' and mot_de_passe_utilisateur='$mdp'");
				$rows=mysql_num_rows($query);
				if($rows==1){
					$_SESSION['login']=$login;
					header('Location:session.php');
				}
				else echo "<center>Mot de passe ou identifiant incorrect</center>";
			}							
			else echo "<center>Complete les champs</center>";
		}
		
		
		
		?>
		<br></br>
			<form method="post" action="connexion.php"> <!--formulaire d'identification user-->
				<fieldset>
					<legend>Authentification</legend>
					<p>
					<label id="formulaire">Identifiant:</label>
					<input type="test" value="" name="login" id="identifiant"/>
					</p>
					<p>
					<label id="formulaire">Mot de passe: </label>
					<input type="password" value="" name="mdp" id="identifiant"/>
					</p>
					<center>
					<input type="submit" value="Valider" name="submit" id="toto"/>
					</center>
				</fieldset>
			</form>
			<br></br>
			<center>
			<img src="image/pelicula.gif" alt="image" id="img" />
			</center>
		</div>
			<div id="piedpage"> lien 2 </div>
	</body>
</html>