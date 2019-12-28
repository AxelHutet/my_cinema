<!DOCTYPE html">
<?php
        require_once ('../../lib/genre.lib.php');
        require_once ('../../lib/distrib.lib.php');
        require_once ('../../lib/film.lib.php');
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
				<li><a href="./films.php" class="bouton">Films</a></li>
				<li><a href="../membre/members.php" class="bouton">Membres</a></li>
			</ul>
		</div>
	</div>
	<div id="content1">
		<div class="column1">
		<div class="list-games">
				<h3 class="title"> Chercher un film </h3>
				<div class="item-game">
					<form>
						<label for="film_title">Titre</label>
						<input type="text" name="film_title" id="film_title" placeholder="Titre du film"/><br/><br/>
						<label for="film_genre">Genre</label>
						<select name="film_genre" id="film_genre" >
						    <option value=""></option>
							<?php
                                $genres = getAllGenre();
                                foreach($genres as $genre){
                                    echo "<option value=".$genre['id_genre'].">".$genre['nom']."</option>";
                                }
                            ?>
						</select><br/><br/>
						<label for="film_distrib">Distributeur</label>
						<select name="film_distrib" id="film_distrib" >
						    <option value=""></option>
							<?php
                                $distribs = getAllDistrib();
                                foreach($distribs as $distrib){
                                    echo "<option value=".$distrib['id_distrib'].">".$distrib['nom']."</option>";
                                }
                            ?>
						</select><br/><br/>
						<input type="submit" value="Rechercher" /><br/><br/>
					</form>
				</div>
			<div class="list-games">
				<h3 class="title"> Liste des films </h3>
				<?php
                    $films = getAllFilm(0,15);
                    foreach ($films as $film){

                        $curr_genre = getGenreById($film["id_genre"]);
                        $curr_distrib = getDistribById($film["id_distrib"]) ;
                        echo '<div class="item-game"><div class="game-description">';
                        echo '<p><B>Titre :</B> '.$film["titre"].'</p>';
                        if(is_array($curr_genre)){
                            echo '<p><B>Genre :</B> '.getGenreById($film["id_genre"])["nom"].'</p>';
                        }else{
                            echo "<p><B>Genre :</B> -</p>";
                        }
                        if(is_array($curr_distrib)){
                            echo '<p><B>Distributeur :</B> '.getDistribById($film["id_distrib"])["nom"].'</p>';
                        }else{
                            echo "<p><B>Distributeur :</B> -</p>";
                        }
                        echo '<p><B>Resumé :</B> '.$film["resum"].'</p>';
                        echo '</div></div>';

                    }
                ?>
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