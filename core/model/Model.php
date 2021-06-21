<?php

require_once "core/database.php";

abstract class Model{
    protected $pdo;
    public function __construct(){
        $this->pdo = getPdo();
    }
/**
 * trouver un garage par son id
 * renvoie un tableau contenant un garage, ou un booleen
 * si inexistant
 * 
 * @param integer $garage_id
 * @return array|bool
 */
    public function find(int $garage_id){
        $maRequete = $this->pdo->prepare("SELECT * FROM garages WHERE id =:garage_id");

        $maRequete->execute(['garage_id' => $garage_id]);

        $result = $maRequete->fetch();

        return $result;
    }
}