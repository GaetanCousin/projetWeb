<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/user.css">
		<link rel="stylesheet" type="text/css" href="css/800.css" media="screen and(max-width:800px)">	
		<link rel="stylesheet" type="text/css" href="css/adminMenu.css">
		<link rel="stylesheet" type="text/css" href="galerie.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script src="galleria/galleria-1.4.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style>
			.galleria{ width: 600px; height: 300px; background: #000 }
		</style>
	</head>
	
	<body>
		<div id="Container">
		<div id="Header">
			<IMG  style=" width:430px;"  src="image/film-logo.jpg">
			<IMG  style=" width:430px;"  src="image/film-logo.jpg">
			<IMG  style=" width:431px;"  src="image/film-logo.jpg">
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
		<div id="SideBar">
			<br/>
			<?php
				session_start();
				if($_SESSION['login'])
				{
					echo "<br>Bienvenue:  </br>".$_SESSION['login']."<br><br><br>";
					echo "<br><br><br><br><br><a href='deconnecte.php'>Se deconnecter</a>";
				}else header('Location:pag1.1.php');
			?>
		</div>
		<div id="MainBody">
				
			<?php 
			include "connect.inc.php";										//connexion a la base de donnee
			$lesActeurs = mysql_query("SELECT nom_acteur, prenom_acteur FROM acteur where nom_acteur != '' ORDER BY nom_acteur ASC");
			$lesCategories =mysql_query("SELECT libelle_categorie FROM categorie ORDER BY libelle_categorie ASC");				//Variable qui contient une select  
			$lesProducteurs=mysql_query("SELECT nom_producteur, prenom_producteur FROM producteur ORDER BY nom_producteur ASC");//Variable qui contient une select 
			?>
					
				
			<form onsubmit="(this)" action="#" name="formStats" method="post">
				</br>
				</br>
				<?php 
				if(isset($_POST['categorie']))
				?>
				<table>
					<tr>
						<td>
							<label id="formulaire" >Categorie:</label>
						</td>
						<td rowspan=11>
						<div class="galleria">
							<?php
								for($i=1;$i<100;$i++){
							?>
								<img src="<?php echo  'images/'.$i.'.jpg'?>">
							<?php } ?>
						</div>
						</td>
					</tr>
					<tr>
						<td>
							<select name="categorie" id="identifiant">
								<?php
									while ($row = mysql_fetch_assoc($lesCategories)) {													//Pour chaque valeur de ma variable faire 
									echo '<option value="'.$row['libelle_categorie'].'">'.$row['libelle_categorie'].'</option>';		//Afficher la variable 
									} 
								?>
							</select>							
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="BCategorie" value="Rechercher" id="toto" />
						</td>
					</tr>
					<tr>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							<label id="formulaire" >Producteur:</label>
						</td>
					</tr>
					<tr>
						<td>
							<select name="listeProducteurs">
								<?php
									while ($row =  mysql_fetch_assoc($lesProducteurs)) {
									echo '<option value="'.$row['nom_producteur'].'@'.$row['prenom_producteur'].'">'.$row['nom_producteur']." ".$row['prenom_producteur'].'</option>';		//Afficher la variable 
									}
								?>
							</select>							
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="producteur" value="Rechercher" id="toto" />
						</td>
					</tr>
					<tr>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							<label id="formulaire">Acteur:</label>
						</td>
					</tr>
					<tr>	
						<td>
							<select name="listeActeurs" id="listeActeurs"  onchange="listeActeurs(this.value)">
								<?php
									while ($row =  mysql_fetch_assoc($lesActeurs)) {
									echo '<option value="'.$row['nom_acteur'].'@'.$row['prenom_acteur'].'">'.$row['nom_acteur']." ".$row['prenom_acteur'].'</option>';		//Afficher la variable 
									}
								?>
							</select>					
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="acteur" value="Rechercher" id="toto" />
						</td>
					</tr>
				</table>
			</form>
			<br>
			</br>
			<div id="galerie">
				<center>				 				 
					<?php
						include "connect.inc.php";
						
						 $imagesActeur=mysql_query("select affiche_film from film where year(date_sortie_film)=2014 ORDER BY `date_sortie_film` DESC limit 10");
							if (isset($_POST['producteur'])) {
							 $valeur=explode("@", $_POST['listeProducteurs']);
							   $nom=$valeur[0];
							$prenom=$valeur[1];
							 $imagesActeur=mysql_query("SELECT affiche_film FROM film NATURAL JOIN est_produit  NATURAL JOIN producteur WHERE nom_producteur ='".$valeur[0]."' AND prenom_producteur ='".$valeur[1]."' ORDER BY titre_film ASC");
							 } 
						 if (isset($_POST['acteur'])) {
							 $valeur=explode("@", $_POST['listeActeurs']);
							   $nom=$valeur[0];
							$prenom=$valeur[1];
							 $imagesActeur=mysql_query("SELECT titre_film, affiche_film FROM film NATURAL JOIN est_compose NATURAL JOIN acteur WHERE nom_acteur='".$valeur[0]."' AND prenom_acteur='".$valeur[1]."' ORDER BY titre_film ASC");
							 } 
						 if (isset($_POST['BCategorie'])) {
							 $imagesActeur=mysql_query("SELECT affiche_film FROM film NATURAL JOIN appartient NATURAL JOIN categorie WHERE UPPER(libelle_categorie)='".$_POST['categorie']."' ORDER BY titre_film ASC");
							 }
						
						$rows=mysql_num_rows($imagesActeur);
						while ($row = mysql_fetch_array($imagesActeur)){
					?>
							<IMG style=" width:160px; height:221px;" src="<?php echo $row['affiche_film']; ?>"  alt="Le France">
					<?php } ?>
				</center>
			</div>	
		</div>
		<div id="Footer"></div>
		</div>
		<script>
            Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
            Galleria.run('.galleria');
        </script>
	</body>
</html>