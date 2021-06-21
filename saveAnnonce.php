<?php
namespace Model;
//require_once "core/database.php";
require_once "core/utils.php";
require_once "core/model/Annonce.php";
require_once "core/model/Garage.php";
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
    $modelGarage = new Garage();
    $garage= $modelGarage->find($garage_id);
    if(!$garage){
        die("Ce garage n'existe pas");
    }
    $model = new \Model\Annonce();
    $model->insert($name, $price, $garage_id);
    redirect("garage.php?id=$garage_id");
