<?php
namespace Model;


class Make extends Model{

    protected $table = "makes";
    public $id;
    public $gateau_Id;
    public $recette_Id;
    public $user_Id;

   

    public function findAllByGateau($gateau_id){

        $maRequetemake = $this->pdo->prepare("SELECT * FROM $this->table WHERE gateau_id =:gateau_id");
        $maRequetemake->execute(['gateau_id'=>$gateau_id]);
        $makes = $maRequetemake->rowCount();
        return $makes;

    }
    public function findAllByRecette($recette_id){

        $maRequetemake = $this->pdo->prepare("SELECT * FROM $this->table WHERE recette_id =:recette_id");
        $maRequetemake->execute(['recette_id'=>$recette_id]);
        $makes = $maRequetemake->rowCount();
        return $makes;

    }
    /**
    * Create a new "make"
    */
    public function insert($gateau_id, $recette_id): void{

        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (gateau_id, recette_id) VALUES (:gateau_id, :recette_id)");
        $queryAdd->execute(['gateau_id' =>$gateau_id, 'recette_id' =>$recette_id]);   
    
    }
    public function findByUserAndItem(object $item, User $user)
    {
        
        $sql = "SELECT * FROM makes WHERE recette_id = :item_id AND user_id = :user_id";


        if(isset($item->flavor)){

            $sql = "SELECT * FROM makes WHERE gateau_id = :item_id AND user_id = :user_id";

        }

        $query = $this->pdo->prepare($sql);
        $query->execute(['item_id'=>$item->id, 'user_id'=>$user->id]);
        $make = $query->fetch();
        
        if($make)
        {   
            return true;

        }else{
            
            return false;
        }

    }

}