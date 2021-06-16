<?php


$pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$result = $pdo->query('SELECT * FROM garages');

$garages= $result->fetchAll();
$titreDeLaPage = "Garages";
ob_start();
require_once "templates/garages/garages.html.php";
$contenuDeLaPage = ob_get_clean();
require_once "templates/layout.html.php";


