<?php

namespace Model;
use PDO;

abstract class Model{
    protected $pdo;
    protected $table;
    public function __construct(){
        $this->pdo = \Database::getPdo();
    }
/**
 * trouver un element par son id
 * renvoie un tableau contenant l'element, ou un booleen
 * si inexistant
 * 
 * @param integer $id
 * @return array|bool
 */
    public function find(int $id, $className){
        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table}  WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $result = $maRequete->fetchObject($className);
        
        return $result;
    }
    
    /**
 * retourne un tableau contenant tous les elemements de 
 * la table X
 * @param string $className
 * @return array
 */
public function findAll(string $className) : array
{

        $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
        
        $items = $resultat->fetchAll(PDO::FETCH_CLASS, $className);

        return $items;

}


/**
 * supprime un item via son ID
 * @param integer $id
 * @return void
 */
public function delete(int $id) :void
{
  
  $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);


}

}