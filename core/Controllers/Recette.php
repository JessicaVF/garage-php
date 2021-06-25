<?php

namespace Controllers;

Class Recette extends Controller{

    protected $modelName = \Model\Recette::class;

    
    public function suppr(){
        if(!empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $recette_id = $_GET['id'];
            $recette= $this->model->find($recette_id);
            if(!$recette){
                die("Ce recette n'existe pas");
            }
            $gateau_id= $recette['gateau_id'];
            $this->model->delete($recette_id);
            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");
            
        }
        else{
            die("il faut entrer un id...");
        }    
    }
    /**
     * create Recettte
     */
    public function create(){
        
        $recetteACreer= false;
        $name = null;
        $description = null;
        
        if(!empty($_POST['description']) && !empty($_POST['name'])){
            $description = htmlspecialchars($_POST['description']);
            $name = htmlspecialchars($_POST['name']);
            $gateau_id = $_POST['id'];
            $recetteACreer = true;
        } 
        
        if($recetteACreer){

            $this->model->insert($name, $description, $gateau_id);
            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");

        }else{

            $modeEdition=false;

            if(!isset($_POST['creation'])){

                if( !empty($_POST['id']) && ctype_digit($_POST['id'])   ){
            
                    $recette_id = $_POST['id'];
                    $modeEdition = true;
                }

            }
            
            if(!$modeEdition){

                $recette = null;
                $titreDeLaPage = "nouveau recette";
                \Rendering::render('recettes/create', compact('recette', 'titreDeLaPage'));
            
            }else{ 
                
                $recette = $this->model->find($recette_id);
                $nomRecette = $recette['name'];
                $titreDeLaPage = "Editer $nomRecette";
                \Rendering::render('recettes/create', compact('recette', 'titreDeLaPage'));

            }
            
        }
    }
    /**
     * Edit le recette
     */

    function edit(){
        
        if(!empty($_POST['nameEdit']) && !empty($_POST['descriptionEdit']) && !empty($_POST['id']) && ctype_digit($_POST['id'])){
            $name = htmlspecialchars($_POST['nameEdit']);
            $description = htmlspecialchars($_POST['descriptionEdit']);
            $id = $_POST['id'];
            $this->model->edit($id, $name, $description);
            $gateau_id = $_POST['gateau_id'];
            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id"); 
        }else{      
            die("formulaire mal rempli");
        }
    }

}