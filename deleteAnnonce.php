<?php
namespace Model;
// require_once "core/database.php";
require_once "core/utils.php";
require_once "core/model/Annonce.php";
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $annonce_id = $_GET['id'];
    $model = new \Model\Annonce();
    $annonce= $model->find($annonce_id);
    if(!$annonce){
        die("Ce annonce n'existe pas");
    }
    $garage_id= $annonce['garage_id'];
    $model-> delete($annonce_id);
    redirect("garage.php?id=$garage_id");
}
else{
    die("il faut entrer un id...");
}
?>