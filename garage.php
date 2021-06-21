<?php
namespace Controllers;
require_once "core/Controllers/Garage.php";
require_once "core/utils.php";
require_once "core/model/Garage.php";
require_once "core/model/Annonce.php";
$garage_id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $garage_id = $_GET['id'];
}
if(!$garage_id){
    die("il faut entrer un id...");
}
$model = new \Controllers\Garage();
$model->show($garage_id);

?>
