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
				<li><a href="./films.php" class="bouton">Films</a></li>
				<li><a href="../membre/members.php"  class="bouton" >Membres</a></li>
			</ul>
		</div>
	</div>
	<div id="content1">
		<div class="column1">
		<div class="list-games">
				<h3 class="title"> Chercher un film </h3>
				<div class="item-game">
				     <form id="search_form">
				        <input type="hidden" id="pagination" name="pagination" value='0' />
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
						<label for="pagination">Pagination</label>
						<select name="pagination_nbr" id="pagination_nbr" >
							<?php
                                $pagis = array(5, 10, 20, 50);
                                foreach($pagis as $pagi){
                                    echo "<option value=".$pagi.">".$pagi."</option>";
                                }
                            ?>
						</select><br/><br/>
						<input type="button" id='submitForm' value="Rechercher" /><br/><br/>
					</form>
				</div>
			<div class="list-games">
				<h3 class="title"> Liste des films </h3>
                <div id='resultFilms'>
                </div>
			</div>
		</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#submitForm").click(function(){
        $("#pagination").val(0);
            $.ajax({
                url : 'get_film.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultFilms").html(result);
                }
            });
        });
        $("#submitForm").click();
    });

    function pagination_previous(offset, min){
        $("#pagination").val(offset-min);
         $.ajax({
                url : 'get_film.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultFilms").html(result);
                }
        });
    }

    function pagination_next(offset, min){
        $("#pagination").val(offset+min);
         $.ajax({
                url : 'get_film.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultFilms").html(result);
                }
        });
    }
</script>
</html>