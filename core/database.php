<?php
function getPdo(){
    $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    return $pdo;
}
/**
 * 
 * Find with all the garages
 * @return array|bool
 * 
 */
function findAllGarages(){
    $pdo = getPdo();
    $result = $pdo->query('SELECT * FROM garages');
    $garages= $result->fetchAll();
    return $garages;
}
/**
 * 
 * Find a garage by it's id
 * @param int $garage_id
 * @return array|bool
 */
function findGarageById(int $garage_id){
    $pdo = getPdo();
    $maRequete = $pdo->prepare("SELECT * FROM garages WHERE id=:garage_id");
    $maRequete->execute(['garage_id' =>$garage_id]);
    $garage= $maRequete->fetch();
    return $garage;
}
/**
 * Delete Garage
 * @param int $garage_id
 */
function deleteGarage(int $garage_id): void{
    $pdo = getPdo();
    $queryDelete = $pdo->prepare("DELETE FROM garages WHERE id=:garage_id");
    $queryDelete->execute(['garage_id' =>$garage_id]);
}
/**
 * Find all the annonces link to a garage
 * @param int $garage_id
 * @return array|bool
 */
function findAllAnnoncesByGarage(int $garage_id){
    $pdo = getPdo();
    $maRequeteAnnonce = $pdo->prepare("SELECT * FROM annonces WHERE garage_id =:garage_id");
    $maRequeteAnnonce->execute(['garage_id' =>$garage_id]);
    $annonces = $maRequeteAnnonce->fetchAll();
    return $annonces;
}
/**
 * Create annonce
 * @param string $name
 * @param int $price
 * @param int $garage_id
 */
function insertAnnonce(string $name, int $price, int $garage_id): void{
    $pdo = getPdo();
    $queryAdd = $pdo->prepare("INSERT INTO annonces (name, price, garage_id) VALUES (:name, :price, :garage_id)");
    $queryAdd->execute(['name' =>$name, 'price' =>$price, 'garage_id' =>$garage_id]);   
}
/**
 * Finds one(1) annonce, base in it's id
 * @param int $annonce_id
 * @return array|bool
 */
function findAnnonce(int $annonce_id){
    $pdo = getPdo();
    $queryVerification = $pdo->prepare("SELECT * FROM annonces WHERE id=:annonce_id");
    $queryVerification->execute(['annonce_id' =>$annonce_id]);
    $annonce= $queryVerification->fetch();
    return $annonce;
}
/**
 * delete an Annonce and call redirect to stay/go to the garage link
 * to the annonce
 * @param int $annonce_id
 * @param int $garage_id
 */
function deleteAnnonce(int $annonce_id, int $garage_id): void{
    $pdo = getPdo();
    $queryDelete = $pdo->prepare("DELETE FROM annonces WHERE id=:annonce_id");
    $queryDelete->execute(['annonce_id' =>$annonce_id]);
}