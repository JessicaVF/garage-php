<?php

namespace Model;
use PDO;


class Recette extends Model{
    protected $table = "recettes";
    public $id;
    public $name;
    public $description;
    public $gateau_id;
    public $user_id;
    

    /**
    * Get the "makes"
    */
    public function getMakes(){
    
        $modelMake = new \Model\Make();
        $makes = $modelMake->findAllByRecette($this->id);
        return $makes;
        
    }

    /**
     * Find all the recettes link to a garage
     * @param int $garage_id
     * @return array|bool
     */
    public function findAllByGateau(int $gateau_id, $className){
        
        $maRequeteRecette = $this->pdo->prepare("SELECT * FROM $this->table WHERE gateau_id =:gateau_id");
        $maRequeteRecette->execute(['gateau_id' =>$gateau_id]);
        $recettes = $maRequeteRecette->fetchAll(PDO::FETCH_CLASS, $className);
        return $recettes;
    }
    /**
   * Create a new recette
   * @param string $name
   * @param string $description
   * @param int $gateau_id
   * 
   */
    public function insert(string $name, string $description, int $gateau_id): void{
        
        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (name, description, gateau_id) VALUES (:name, :description, :gateau_id)");
        $queryAdd->execute(['name' =>$name, 'description' =>$description, 'gateau_id' => $gateau_id]);   
    }

    public function edit(int $id, string $name, string $description): void{
        $queryEdit = $this->pdo->prepare("UPDATE $this->table SET name = :name, description = :description WHERE id=:id"); 
        $queryEdit->execute(['name' =>$name, 'description' =>$description, 'id'=>$id]);
    }
    public function findAuthor(){

        $author = $this->find($this->user_id, \Model\User::class, "users");
        return $author;

    }
}