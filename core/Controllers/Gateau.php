<?php

namespace Controllers;

class Gateau extends Controller{

    protected $modelName = \Model\Gateau::class;

    /**
     * afficher l'accueil du site
     */
    public function index(){

        $gateaux =$this->model->findAll($this->modelName);
       
        $titreDeLaPage = "Gateaux";

        $userModel = new \Model\ User();
        $user = $userModel->getUser();

        \Rendering::render("gateaux/gateaux", compact('gateaux', 'titreDeLaPage', 'user'));
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

        $gateau= $this->model->find($gateau_id, $this->modelName);

        $titreDeLaPage = $gateau ->name;

        $modelRecette = new \Model\Recette();

        $userModel = new \Model\ User();
        $user = $userModel->getUser();

        $recettes = $modelRecette->findAllByGateau($gateau_id, \Model\Recette::class);
        

        \Rendering::render("gateaux/gateau", compact('gateau', 'titreDeLaPage', 'recettes', 'user'));
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

        $gateau= $this->model->find($gateau_id, $this->modelName);

        if(!$gateau){
            die("Ce gateau n'existe pas");
        }
        
        $this->model->delete($gateau_id);
        \Http::redirect("index.php?controller=gateau&task=index");

    }
    /**
     * Add an gateau
     */
    public function create(){
        
        $gateauACreer= false;
        $name = null;
        $flavor = null;
        
        if(!empty($_POST['flavor']) && !empty($_POST['name'])){
            $flavor = htmlspecialchars($_POST['flavor']);
            $name = htmlspecialchars($_POST['name']);
            $gateauACreer = true;
        } 
        if($gateauACreer){

            $this->model->insert($name, $flavor);
            \Http::redirect("index.php?controller=gateau&task=index");
        }else{

            $modeEdition=false;

            if( !empty($_POST['id']) && ctype_digit($_POST['id'])   ){
               
                $gateau_id = $_POST['id'];
                $modeEdition = true;
         
            }
            if(!$modeEdition){
                $gateau = null;
                $titreDeLaPage = "nouveau gateau";
                \Rendering::render('gateaux/create', compact('gateau','titreDeLaPage')); 
            }else{ 
                
                $gateau = $this->model->find($gateau_id, $this->modelName);
                $nomGateau = $gateau->name;
                $titreDeLaPage = "Editer $nomGateau";
                \Rendering::render('gateaux/create', compact('gateau','titreDeLaPage')); 

            }
        }
    }
    /**
     * Edit le gateau
     */
    function edit(){
        
        if(!empty($_POST['nameEdit']) && !empty($_POST['flavorEdit']) && !empty($_POST['id']) && ctype_digit($_POST['id'])){
            $name = htmlspecialchars($_POST['nameEdit']);
            $flavor = htmlspecialchars($_POST['flavorEdit']);
            $id = $_POST['id'];
            $this->model->edit($id, $name, $flavor);
            \Http::redirect("index.php?controller=gateau&task=show&id=$id"); 
        }else{      
            die("formulaire mal rempli");
        }
    }
}