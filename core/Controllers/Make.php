<?php 

namespace Controllers;

class Make extends controller{

    protected $modelName = \Model\Make::class;

   

    public function save(){
    
        $gateau_id =null;
        $recette_id=null;

        if(!empty($_POST['gateu_id'])&&!empty($_POST['recette_id'])){
            die("Make a recette and a gateau at the same time is not allow it");
        }

        if(!empty($_POST['gateu_id']) && ctype_digit($_POST['gateu_id'])){
            $gateau_id = $_POST['gateau_id'];
        }
        if(!empty($_POST['recette_id']) && ctype_digit($_POST['recette_id'])){
            $recette_id= $_POST['recette_id'];
        }
        $make = new\Model\Make();
        $make->insert($gateau_id, $recette_id);
        
    }


}