<?php

namespace Controllers;

require_once "core/utils.php";
require_once "core/Model/Garage.php";
require_once "core/model/Annonce.php";

class Garage{
    /**
     * afficher l'accueil du site
     */
    public function index(){
        $model = new \Model\Garage();
        $garages =$model->findAll();
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
        $model = new \Model\ Garage();
        $garage= $model->find($garage_id);
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
        $model = new \Model\Garage();
        $garage= $model->find($garage_id);

        if(!$garage){
            die("Ce garage n'existe pas");
        }
        $model->delete($garage_id);
        redirect("index.php");


    }

}