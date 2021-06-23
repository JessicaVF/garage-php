<?php

namespace Model;

class Gateau extends Model {

  protected $table = "gateaux";
  /**
   * Create a new gateau
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
  
}
