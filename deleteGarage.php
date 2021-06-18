<?php
require_once "core/database.php";
require_once "core/utils.php";
require_once "core/model/Garage.php";

$garage_id = null;
if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $garage_id = $_GET['id'];  
}
if(!$garage_id){
    die("il faut entrer un id...");
}
$model = new Garage();
$garage= $model->find($garage_id);

if(!$garage){
    die("Ce garage n'existe pas");
}
$model->delete($garage_id);
redirect("index.php");

?>