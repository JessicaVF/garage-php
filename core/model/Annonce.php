<?php
require_once "core/model/Model.php";

class Annonce extends Model {
    /**
 * Find all the annonces link to a garage
 * @param int $garage_id
 * @return array|bool
 */
function findAllByGarage(int $garage_id){
    
    $maRequeteAnnonce = $this->pdo->prepare("SELECT * FROM annonces WHERE garage_id =:garage_id");
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
function insert(string $name, int $price, int $garage_id): void{
    
    $queryAdd = $this->pdo->prepare("INSERT INTO annonces (name, price, garage_id) VALUES (:name, :price, :garage_id)");
    $queryAdd->execute(['name' =>$name, 'price' =>$price, 'garage_id' =>$garage_id]);   
}
/**
 * Finds one(1) annonce, base in it's id
 * @param int $annonce_id
 * @return array|bool
 */
function find(int $annonce_id){
    
    $queryVerification = $this->pdo->prepare("SELECT * FROM annonces WHERE id=:annonce_id");
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
function delete(int $annonce_id, int $garage_id): void{
    
    $queryDelete = $this->pdo->prepare("DELETE FROM annonces WHERE id=:annonce_id");
    $queryDelete->execute(['annonce_id' =>$annonce_id]);
}
}