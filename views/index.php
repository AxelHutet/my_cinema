<!DOCTYPE html">
<?php
        require_once ('../lib/membre.lib.php');
        var_dump(getMembreById(1));
?>
<html>
<head>
	<title>Ma Ludothèque</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="res/style/style.css" />
</head>
<body>
	<div id="header">
		<div class="header-logo">
			<img class="logo-img" src="res/img/cam.png" /> <span style="padding-left: 15px;">My Cinema</span>
		</div>
		<div class="header-menu">
			<ul id="menu_horizontal">
				<li><a href="index.html" class="bouton">Accueil</a></li>
				<li><a href="film/films.html" class="bouton">Films</a></li>
				<li><a href="membre/members.html" class="bouton">Membres</a></li>
			</ul>
		</div>
	</div>
	<div id="content">

	</div>
	</body>
	<footer class="footer">
		<div style="margin: auto;">
			<div class=citation>
				<i>"On ne cesse pas de jouer quand on devient vieux, mais on devient vieux quand on cesse de jouer"</i><br />
				(Georges Bernard Shaw)
			</div>
			<p>&copy; Hutet Axel - Tous droits réservés</p>
		</div>

	</footer>		
	</html>





















