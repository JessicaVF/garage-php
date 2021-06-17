<?php
require_once "core/database.php";
require_once "core/utils.php";
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $garage_id = $_GET['id'];   
    $garage= findGarageById($garage_id);
    if(!$garage){
        die("Ce garage n'existe pas");
    }
    deleteGarage($garage_id);
}
else{
    die("il faut entrer un id...");
}
?>