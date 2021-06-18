<?php
require_once "core/database.php";
class Garage {
    /**
 * retourne un tableau contenant tous les garages de 
 * la table garages
 * 
 * @return array
 */
public function findAll() : array
{
        $pdo = getPdo();

        $resultat =  $pdo->query('SELECT * FROM garages');
        
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

  $pdo = getPdo();

  $maRequete = $pdo->prepare("SELECT * FROM garages WHERE id =:garage_id");

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
  $pdo = getPdo();

  $maRequete = $pdo->prepare("DELETE FROM garages WHERE id =:garage_id");

  $maRequete->execute(['garage_id' => $garage_id]);


}


}
