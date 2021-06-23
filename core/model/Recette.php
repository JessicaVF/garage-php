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

}