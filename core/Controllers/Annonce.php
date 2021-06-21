<?php
namespace Controllers;

require_once "core/utils.php";
require_once "core/Model/Garage.php";
require_once "core/Model/Annonce.php";
require_once "core/Controllers/Garage.php";

class Annonce{
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
        $model = new \Model\Annonce();
        $model->insert($name, $price, $garage_id);
        redirect("garage.php?id=$garage_id");
        
    }
    public function suppr(){
        if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $annonce_id = $_GET['id'];
            $model = new \Model\Annonce();
            $annonce= $model->find($annonce_id);
            if(!$annonce){
                die("Ce annonce n'existe pas");
            }
            $garage_id= $annonce['garage_id'];
            $model-> delete($annonce_id);
            redirect("garage.php?id=$garage_id");
        }
        else{
            die("il faut entrer un id...");
        }
        
    }
}
