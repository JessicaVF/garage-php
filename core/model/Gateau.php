<?php

namespace Model;

class Gateau extends Model {

  protected $table = "gateaux";
  public $id;
  public $flavor;
  
  /**
   * Get the "makes"
   */
  public function getMakes(){
    
    $modelMake = new \Model\Make();
    $makes = $modelMake ->findAllByGateau($this->id);
    return $makes;
  }

  /**
   * Create a new gateau
   * @param string $name
   * @param string $flavor
   */
  function insert(string $name, string $flavor): void{
        
    $queryAdd = $this->pdo->prepare("INSERT INTO gateaux (name, flavor) VALUES (:name, :flavor)");
    $queryAdd->execute(['name' =>$name, 'flavor' =>$flavor]);   
}
/**
 * Edit the info of a existent gateau
 */
  function edit(int $id, string $name, string $flavor): void{
     $queryEdit = $this->pdo->prepare("UPDATE gateaux SET name = :name, flavor = :flavor WHERE id=:id"); 
     $queryEdit->execute(['name' =>$name, 'flavor' =>$flavor, 'id'=>$id]);
  }
  
  public function findAuthor(){

    $author = $this->find($this->user_id, \Model\User::class, "users");
    return $author;

}
}
