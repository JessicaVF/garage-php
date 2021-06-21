<?php

namespace Controllers;

require_once "core/utils.php";
require_once "core/Model/Garage.php";

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
    public function show($garage_id){
        $model = new \Model\ Garage();
        $garage= $model->find($garage_id);
        $titreDeLaPage = $garage['name'];
        $modelAnnonce = new \Model\ Annonce();
        $annonces = $modelAnnonce->findAllByGarage($garage_id);
        render("garages/garage", compact('garage', 'titreDeLaPage', 'annonces'));
    }


    public function suppr(){


    }

}