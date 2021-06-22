<?php
namespace Controllers;

class Annonce extends Controller{
    protected $modelName = \Model\Annonce::class;
    /**
     * Add an annonce
     */
    public function save(){
        $name = null;
        $price = null;
        $garage_id = null;

        if(!empty($_POST['garage_id']) && ctype_digit($_POST['garage_id'])) {
            $garage_id = $_POST['garage_id'];
        }
        if(!empty($_POST['price'])&& ctype_digit($_POST['price'])){
            $price = $_POST['price'];
        } 
        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }
        if( !$garage_id || !$name || !$price ){
            die("formulaire mal rempli");
        }
        $modelGarage = new \Model\Garage();
        $garage= $modelGarage->find($garage_id);
        if(!$garage){
            die("Ce garage n'existe pas");
        }
    
        $this->model->insert($name, $price, $garage_id);
        \Http::redirect("index.php?controller=garage&task=show&id=$garage_id");
        
    }
    public function suppr(){
        if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $annonce_id = $_GET['id'];
            $annonce= $this->model->find($annonce_id);
            if(!$annonce){
                die("Ce annonce n'existe pas");
            }
            $garage_id= $annonce['garage_id'];
            $this->model->delete($annonce_id);
            \Http::redirect("index.php?controller=garage&task=show&id=$garage_id");
            
        }
        else{
            die("il faut entrer un id...");
        }
        
    }
}
