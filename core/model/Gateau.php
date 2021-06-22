<?php

namespace Model;

class Gateau extends Model {

  protected $table = "gateaux";

  function insert(string $name, string $flavor): void{
        
    $queryAdd = $this->pdo->prepare("INSERT INTO gateaux (name, flavor) VALUES (:name, :flavor)");
    $queryAdd->execute(['name' =>$name, 'flavor' =>$flavor]);   
}

}
