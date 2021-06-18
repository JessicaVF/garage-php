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
 * trouver un garage par son id
 * renvoie un tableau contenant un garage, ou un booleen
 * si inexistant
 * 
 * @param integer $garage_id
 * @return array|bool
 */
public function find(int $garage_id)
{

  

  $maRequete = $this->pdo->prepare("SELECT * FROM garages WHERE id =:garage_id");

  $maRequete->execute(['garage_id' => $garage_id]);

  $garage = $maRequete->fetch();

  return $garage;

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
