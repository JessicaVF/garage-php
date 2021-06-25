<?php
namespace Model;


class Make extends Model{

    protected $table = "makes";

   

    public function findAllByGateau($gateau_id){

        $maRequetemake = $this->pdo->prepare("SELECT * FROM makes WHERE gateau_id =:gateau_id");
        $maRequetemake->execute(['gateau_id'=>$gateau_id]);
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

}