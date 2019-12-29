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
					<form id="search_form">
					<input type="hidden" id="pagination" name="pagination" value='0' />
						<label for="nom_membre">Nom</label>
						<input type="text" name="nom_membre" id="nom_membre" placeholder="Nom du membre"/><br/><br/>
						<label for="prenom_membre">Prénom</label>
						<input type="text" name="prenom_membre" id="prenom_membre" placeholder="Prénom du membre"/><br/><br/>
						<label for="id_membre">ID membre</label>
						<input type="text" name="id_membre" id="id_membre" placeholder="ID du membre"/><br/><br/>
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
						<input type="button" value="Rechercher" id="submitForm" /><br/><br/>
					</form>
				</div>
				<div class="list-games">
				<h3 class="title"> Liste des membres </h3>
                <div id='resultMembres'>
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
                url : 'get_membre.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultMembres").html(result);
                }
            });
        });
        $("#submitForm").click();
    });

    function pagination_previous(offset, min){
        $("#pagination").val(offset-min);
         $.ajax({
                url : 'get_membre.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultMembres").html(result);
                }
        });
    }

    function pagination_next(offset, min){
        $("#pagination").val(offset+min);
         $.ajax({
                url : 'get_membre.php', // La ressource ciblée
                type:'POST',
                data:$("#search_form").serialize(),
                success : function(result){
                    $("#resultMembres").html(result);
        }
        });
        }
        </script>
</html>