<?php

// $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
// ]);
// $id = $_GET['id'];
// $query= "SELECT * FROM garages WHERE id =".$id;
// $result = $pdo->query("$query");
// $garage= $result->fetch();
// var_dump($garage);
// $annonces = ['one annonce', 'two annonces', 'three annonces'];
$garage_id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $garage_id = $_GET['id'];
}
if(!$garage_id){
    die("il faut entrer un id...");
}
$pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$maRequete = $pdo->prepare("SELECT * FROM garages WHERE id=:garage_id");
$maRequete->execute(['garage_id' =>$garage_id]);
$garage= $maRequete->fetch();
$titreDeLaPage = $garage['name'];

// Annonces
$maRequeteAnnonce = $pdo->prepare("SELECT * FROM annonces WHERE garage_id =:garage_id");
$maRequeteAnnonce->execute(['garage_id' =>$garage_id]);
$annonces = $maRequeteAnnonce->fetchAll();
//
ob_start();
require_once "templates/garages/garage.html.php";
$contenuDeLaPage = ob_get_clean();
require_once "templates/layout.html.php";
?>
