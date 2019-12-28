<!DOCTYPE html">
<?php
        require_once ('../../lib/membre.lib.php');
        require_once ('../../lib/historique_membre.lib.php');
        require_once ('../../lib/fiche_personne.lib.php');
?>
<html>
<head>
	<title>My Cinema</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="../res/style/style.css" />
</head>
<body>
	<div id="header">
		<div class="header-logo">
			<img class="logo-img" src="../res/img/cinema.png" /> <span style="padding-left: 15px;">My Cinema</span>
		</div>
		<div class="header-menu">
			<ul id="menu_horizontal">
				<li><a href="../index.php" class="bouton">Accueil</a></li>
				<li><a href="../film/films.php" class="bouton">Films</a></li>
				<li><a href="./members.php" class="bouton">Membres</a></li>
			</ul>
		</div>
	</div>
	<div id="content1">
		<div class="column1">
		<div class="list-games">
				<h3 class="title"> Chercher un membre </h3>
				<div class="item-game">
					<form>
						<label for="nom_membre">Nom</label>
						<input type="text" name="nom_membre" id="nom_membre" placeholder="Nom du membre"/><br/><br/>
						<label for="prenom_membre">Prénom</label>
						<input type="text" name="prenom_membre" id="prenom_membre" placeholder="Prénom du membre"/><br/><br/>
						<label for="id_membre">ID membre</label>
						<input type="text" name="id_membre" id="id_membre" placeholder="ID du membre"/><br/><br/>
						</select><br/><br/>
						<input type="submit" value="Rechercher" /><br/><br/>
					</form>
				</div>
		</div>
		</div>
	</div>
</body>
<footer class="footer">
	<div style="margin: auto;">
		<div class=citation>
			<i>"Un film n'est pas une tranche de vie, c'est une tranche de gâteau."</i><br />
            (Alfred Hitchcock)
        </div>
        <p>&copy; Hutet Axel - Tous droits réservés</p>
    </div>
</footer>
</html>