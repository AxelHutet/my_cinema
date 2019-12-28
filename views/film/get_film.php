<?php
require_once ('../../lib/film.lib.php');
require_once ('../../lib/genre.lib.php');
require_once ('../../lib/distrib.lib.php');

$distrib = $_POST["film_distrib"];
$titre  = $_POST["film_title"];
$genre = $_POST["film_genre"];
$pagination = $_POST["pagination"];

$films = getFilmByDistribGenreAndTitle($titre,$distrib,$genre,$pagination,15);
$return_str = "";
if(is_array($films) && count($films) > 0){

    foreach ($films as $film){

        $curr_genre = getGenreById($film["id_genre"]);
        $curr_distrib = getDistribById($film["id_distrib"]) ;
        $return_str .= '<div class="item-game"><div class="game-description">';
        $return_str .= '<p><B>Titre :</B> '.$film["titre"].'</p>';
        if(is_array($curr_genre)){
            $return_str .= '<p><B>Genre :</B> '.getGenreById($film["id_genre"])["nom"].'</p>';
        }else{
            $return_str .= "<p><B>Genre :</B> -</p>";
        }
        if(is_array($curr_distrib)){
            $return_str .= '<p><B>Distributeur :</B> '.getDistribById($film["id_distrib"])["nom"].'</p>';
        }else{
            $return_str .= "<p><B>Distributeur :</B> -</p>";
        }
        $return_str .= '<p><B>Resumé :</B> '.$film["resum"].'</p>';
        $return_str .= '</div></div>';

    }

}

if(is_array($films) && count($films) == 15){
    $return_str .= "<input type='button' value='Next' onclick='pagination_next(\'".$pagination."\'' />";
    $return_str .= "<input type='button' value='Previous' onclick='pagination_previous(\'".$pagination."\'' />";
}

echo $return_str;