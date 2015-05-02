<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<html>
	<head>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 <script LANGUAGE="javascript">										//code dans le fichier HTML
		 function afficherMessage (message) {
			 if(document.getElementById)
			document.getElementById('galerie').innerHTML = message;;
			
		}
	</script>
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
			--><li><a href="#">A propos</a></li><!--
			--><li><a href="#">Contact</a></li><!--
			--><li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>
		
			
				<div id="galerie">
				<center>
				<?php
					include "connect.inc.php";	
					$images=mysql_query("select id_film, titre_film from film where year(date_sortie_film)=2014 ORDER BY `date_sortie_film` DESC limit 20");
					while ($row = mysql_fetch_array($images)){ //src'?>
						<span class="tit">TESE</span>
						<IMG style=" width:160px; height:221px;" src=" <?php echo  'images/'.$row['id_film'].'.jpg'?>" onMouseOver="<?phpecho $row['titre_film'];?>">
						
				<?php } ?>
				</center>
				</div>	
			
			<div id="piedpage"> lien 2 </div>
	</body>
</html>