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
   * @param string $name
   * @param string $description
   * @param int $gateau_id
   * 
   */
    function insert(string $name, string $description, int $gateau_id): void{
        
        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (name, description, gateau_id) VALUES (:name, :description, :gateau_id)");
        $queryAdd->execute(['name' =>$name, 'description' =>$description, 'gateau_id' => $gateau_id]);   
    }

    function edit(int $id, string $name, string $description): void{
        $queryEdit = $this->pdo->prepare("UPDATE gateaux SET name = :name, description = :description WHERE id=:id"); 
        $queryEdit->execute(['name' =>$name, 'description' =>$description, 'id'=>$id]);
    }
}