<?php

namespace Model;

class Annonce extends Model {

    protected $table = "annonces";
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
}