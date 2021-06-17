<?php
require_once "core/database.php";
require_once "core/utils.php";
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $annonce_id = $_GET['id'];
    $annonce= findAnnonce($annonce_id);
    if(!$annonce){
        die("Ce annonce n'existe pas");
    }
    $garage_id= $annonce['garage_id'];
    deleteAnnonce($annonce_id, $garage_id);
    redirect("garage.php?id=$garage_id");
}
else{
    die("il faut entrer un id...");
}
?>