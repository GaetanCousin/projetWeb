<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<link rel="stylesheet" type="text/css" href="css/800.css" media="screen and(max-width:800px)">	
		<link rel="stylesheet" type="text/css" href="css/adminMenu.css">
		<link rel="stylesheet" type="text/css" href="css/formulaire.css">
	</head>
	
	<body>
		<div id="Container">
			<div id="Header">
				<div>Administrateur</div>
			</div>
			
			<div id="Deconnexion">
				<?php
					session_start();
					if($_SESSION['login'])
					{
						echo "<a href='deconnecte.php'>Se deconnecter</a>"; 
					}else header('Location:pag1.1.php');
				?>
			</div>
			
			
			<div id="Menu">
				<div>
					<ul>
						<li><a href="pag1.1.php">Accueil</a></li>
						<li><a href="pageInscription.php">Inscription</a></li>
						<li><a href="aPropos.html">A propos</a></li>
						<li><a href="connexion.php">Connexion</a></li>
					</ul>
				</div>
			</div>
			
			<div id="MainLeft"></div>
			
			
			<div id="MainBody">
			
				<center>
				<form method="post" action="">
				<fieldset>
					<legend>Ajouter un film </legend>
				<table>
				
					<tr>
						<th>
							<label id="formulaire">Titre film:</label>
							</br>
							<input type="text" value="" name="TitreFilm" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<label id="formulaire">Date de sortie:</label>
							</br>
							<input type="test" name="DateSortie" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<label id="formulaire">Affiche film:</label>
							</br>
							<input type="text" name="AfficheFilm" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<label id="formulaire">Lien film:</label>
							</br>
							<input type="text" name="LienFilm" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<input id="toto" type="submit"  value="Enregistrer" name="enregistrer"/>
						</th>
					</tr>
					<tr>
						<th>
							<?php
					if(isset($_POST['enregistrer'])){
						$_POST['TitreFilm']=htmlentities(trim($_POST['TitreFilm']));
						$_POST['DateSortie']=htmlentities(trim($_POST['DateSortie']));
						$_POST['AfficheFilm']=htmlentities(trim($_POST['AfficheFilm']));
						$_POST['LienFilm']=htmlentities(trim($_POST['LienFilm']));
						
						if($_POST['TitreFilm']&&$_POST['DateSortie']&&$_POST['AfficheFilm']&&$_POST['LienFilm']){  //verifie si les champs sont tous completes
							include "connect.inc.php"; 			// le fichier qui fait la connexion a la base de donnee
							$reg=mysql_query("SELECT * FROM film WHERE titre_film='".$_POST['TitreFilm']."'");  //verifi si le film existe deja
							$rows=mysql_num_rows($reg);			//compte le nr de ligns dans ma variable
							
							if($rows==0){
								$query="INSERT INTO film (titre_film, date_sortie_film, affiche_film, lien_film) 
									VALUES('".$_POST['TitreFilm']."','".$_POST['DateSortie']."','".$_POST['AfficheFilm']."','".$_POST['LienFilm']."')";	//enregistre la requet
									mysql_query( $query );							// envoier la requet
									echo mysql_error();								// afficher si il y a des erreurs
									echo "Inscription  enregistree";
							}
							else echo "Le film existe deja";
						}
						else echo "Saisir tous les champs";
					}
				?>
						</th>
					</tr>
					</form>
				</table>
				</fieldset>
				</center>
				
				
			
			</div>
			<div id="MainRight">
					<center>
				<form method="post" action="">
					<fieldset>
					<legend>Ajouter un administrateur </legend>
				<table>
				
					<tr>
						<th>
							<label id="formulaire">Nom:</label>
							</br>
							<input type="text" value="" name="nomAdmin" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<label id="formulaire">Prenom:</label>
							</br>
							<input type="test" name="prenomAdmin" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
							<label id="formulaire">Pseudo :</label>
							</br>
							<input type="text" name="pseudoAdmin" id="identifiant"/>
						</th>
					</tr>
					<tr>
						<th>
						</th>
					</tr>
					<tr>
						<th>
							<input id="toto" type="submit"  value="Ajouter" name="Ajouter"/>
							<input id="toto" type="submit"  value="Suprimer" name="Suprimer"/>
						</th>
					</tr>
					<tr>
						<th>
							<?php
					if(isset($_POST['Ajouter'])||isset($_POST['Suprimer'])){
						$_POST['nomAdmin']=htmlentities(trim($_POST['nomAdmin']));
						$_POST['prenomAdmin']=htmlentities(trim($_POST['prenomAdmin']));
						$_POST['pseudoAdmin']=htmlentities(trim($_POST['pseudoAdmin']));
						
						if($_POST['nomAdmin']&&$_POST['prenomAdmin']&&$_POST['pseudoAdmin']){  //verifie si les champs sont tous completes
							include "connect.inc.php"; 			// le fichier qui fait la connexion a la base de donnee
							$reg=mysql_query("SELECT * FROM utilisateur WHERE nom_utilisateur='".$_POST['nomAdmin']."' AND prenom_utilisateur='".$_POST['prenomAdmin']."' AND pseudo_utilisateur='".$_POST['pseudoAdmin']."'");  //verifi si le film existe deja
							$rows=mysql_num_rows($reg);			//compte le nr de ligns dans ma variable
							
							if($rows==1){
								if(isset($_POST['Ajouter'])){
									$query="update utilisateur set admin =1 WHERE nom_utilisateur='".$_POST['nomAdmin']."' AND pseudo_utilisateur='".$_POST['pseudoAdmin']."'";
								}
								else{
									$query="update utilisateur set admin =0 WHERE nom_utilisateur='".$_POST['nomAdmin']."' AND pseudo_utilisateur='".$_POST['pseudoAdmin']."'";
								}
									mysql_query( $query );							// envoier la requet
									echo mysql_error();								// afficher si il y a des erreurs
									echo "Opération effectuee";
							}
							else echo "Utilisateur inconnu";
						}
						else echo "Saisir tous les champs";
					}
				?>
						</th>
					</tr>
					</form>
				</table>
				</fieldset>
				</center>
				
			</div>
			
			<div id="Footer"> </div>
			
		</div>
	</body>
</html>