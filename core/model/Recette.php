<?php

namespace Model;

class Recette extends Model{
    protected $table = "recettes";

    /**
     * Find all the recettes link to a garage
     * @param int $garage_id
     * @return array|bool
     */
    function findAllByGateau(int $gateau_id){
        
        $maRequeteRecette = $this->pdo->prepare("SELECT * FROM recettes WHERE gateau_id =:gateau_id");
        $maRequeteRecette->execute(['gateau_id' =>$gateau_id]);
        $recettes = $maRequeteRecette->fetchAll();
        return $recettes;
    }
    /**
   * Create a new recette
   */
    function insert(string $name, string $description): void{
        
        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (name, description) VALUES (:name, :description)");
        $queryAdd->execute(['name' =>$name, 'description' =>$description]);   
    }

    function edit(int $id, string $name, string $description): void{
        $queryEdit = $this->pdo->prepare("UPDATE gateaux SET name = :name, description = :description WHERE id=:id"); 
        $queryEdit->execute(['name' =>$name, 'description' =>$description, 'id'=>$id]);
    }
}