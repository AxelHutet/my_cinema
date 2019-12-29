<?php
require_once ('../../lib/historique_membre.lib.php');
require_once ('../../lib/fiche_personne.lib.php');
require_once ('../../lib/membre.lib.php');

$name = $_POST["nom_membre"];
$forname  = $_POST["prenom_membre"];
$id = $_POST["id_membre"];
$pagination = $_POST["pagination"];
$pagination_nbr = $_POST["pagination_nbr"];

$members = getMembersByNameFornameAndId($name,$forname,$id,$pagination, $pagination_nbr);
$members_count = getCountMembersByNameFornameAndId($name,$forname,$id);
$return_str = "";

if(is_array($members) && count($members) > 0){

    foreach ($members as $member){

        $curr_fichepersonne = getFichePersonneById($member["id_fiche_perso"]);
        $return_str .= '<div class="item-game"><div class="game-description">';
        $return_str .= '<p><B>Nom :</B> '.$curr_fichepersonne["nom"].'</p>';
        $return_str .= '<p><B>Prénom :</B> '.$curr_fichepersonne["prenom"].'</p>';
        $return_str .= '<p><B>ID :</B> '.$member["id_membre"].'</p>';
        $return_str .= '</div></div>';
    }

}
if($pagination > 0){
    $return_str .= "<input type='button' value='Previous' onclick='pagination_previous(".$pagination.",".$pagination_nbr.");' />";
}
if(is_array($members) && intval($members_count[0]) >  (intval($pagination_nbr)+intval($pagination)) ){
    $return_str .= "<input type='button' value='Next' onclick='pagination_next(".$pagination.",".$pagination_nbr.");' />";
}

echo $return_str;