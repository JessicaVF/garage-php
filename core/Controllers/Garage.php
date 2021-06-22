<?php

namespace Controllers;

require_once "core/utils.php";

class Garage extends Controller{
    protected $modelName = \Model\Garage::class;

    /**
     * afficher l'accueil du site
     */
    public function index(){
        $garages =$this->model->findAll();
        $titreDeLaPage = "Garages";
        render("garages/garages", compact('garages', 'titreDeLaPage'));
    }
    public function show(){
        $garage_id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $garage_id = $_GET['id'];
        }
        if(!$garage_id){
            die("il faut entrer un id...");
        }
        $garage= $this->model->find($garage_id);
        $titreDeLaPage = $garage['name'];
        $modelAnnonce = new \Model\ Annonce();
        $annonces = $modelAnnonce->findAllByGarage($garage_id);
        render("garages/garage", compact('garage', 'titreDeLaPage', 'annonces'));
    }


    public function suppr(){
        $garage_id = null;
        if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $garage_id = $_GET['id'];  
        }
        if(!$garage_id){
            die("il faut entrer un id...");
        }

        $garage= $this->model->find($garage_id);

        if(!$garage){
            die("Ce garage n'existe pas");
        }
        $this->model->delete($garage_id);
        redirect("index.php");


    }

}