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
			
		<div id="galerie">
			<center>
				<?php
					include "connect.inc.php";	
					$images=mysql_query("select id_film, titre_film from film where year(date_sortie_film)=2014 ORDER BY `date_sortie_film` DESC limit 20");
					while ($row = mysql_fetch_array($images)){?>
						
					<div class="item">
						<img src=" <?php echo  'images/'.$row['id_film'].'.jpg'?>"  style=" width:160px; height:221px;" alt=""/>
						<span class="caption"><?php echo  $row['titre_film']?></span>
					</div>	
				<?php } ?>
			</center>
		</div>	
			
		<div id="piedpage"> </div>
	</body>
</html>