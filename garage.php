<?php
require_once "core/database.php";
require_once "core/utils.php";

$garage_id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $garage_id = $_GET['id'];
}
if(!$garage_id){
    die("il faut entrer un id...");
}

$garage= findGarageById($garage_id);
$titreDeLaPage = $garage['name'];

// Annonces
$annonces = findAllAnnoncesByGarage($garage_id);
//

render("garages/garage", compact('garage', 'titreDeLaPage', 'annonces'));
?>
