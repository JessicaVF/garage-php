<?php

namespace Controllers;

class Gateau extends Controller{

    protected $modelName = \Model\Gateau::class;

    /**
     * afficher l'accueil du site
     */
    public function index(){

        $gateaux =$this->model->findAll();

        $titreDeLaPage = "Gateaux";

        \Rendering::render("gateaux/gateaux", compact('gateaux', 'titreDeLaPage'));
    }
     /**
     *  affiche un gateau
     */
    public function show(){

        $gateau_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $gateau_id = $_GET['id'];
        }
        if(!$gateau_id){
            die("il faut entrer un id...");
        }

        $gateau= $this->model->find($gateau_id);

        $titreDeLaPage = $gateau['name'];

        \Rendering::render("gateaux/gateau", compact('gateau', 'titreDeLaPage'));
    }
    /**
     * Delete a gateau
     */

    public function suppr(){

        $gateau_id = null;

        if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $gateau_id = $_GET['id'];  
        }
        if(!$gateau_id){
            die("il faut entrer un id...");
        }

        $gateau= $this->model->find($gateau_id);

        if(!$gateau){
            die("Ce gateau n'existe pas");
        }
        
        $this->model->delete($gateau_id);
        \Http::redirect("index.php?controller=gateau&task=index");

    }
    /**
     * Add an annonce
     */
    public function save(){
        $name = null;
        $flavor = null;
        
        if(!empty($_POST['flavor'])){
            $flavor = $_POST['flavor'];
        } 
        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }
        if( !$name || !$flavor ){
            echo $flavor;
            die("formulaire mal rempli");
        }
        
        $this->model->insert($name, $flavor);
        \Http::redirect("index.php?controller=gateau&task=index");
        
    }
}