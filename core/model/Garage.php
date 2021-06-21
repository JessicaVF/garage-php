<?php
require_once "core/model/Model.php";
class Garage extends Model {
    /**
 * retourne un tableau contenant tous les garages de 
 * la table garages
 * 
 * @return array
 */
public function findAll() : array
{

        $resultat =  $this->pdo->query('SELECT * FROM garages');
        
        $garages = $resultat->fetchAll();

        return $garages;

}

/**
 * supprime un garage via son ID
 * @param integer $garage_id
 * @return void
 */
public function delete(int $garage_id) :void
{
  

  $maRequete = $this->pdo->prepare("DELETE FROM garages WHERE id =:garage_id");

  $maRequete->execute(['garage_id' => $garage_id]);


}


}
