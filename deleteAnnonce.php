<?php
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $annonce_id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $queryVerification = $pdo->prepare("SELECT * FROM annonces WHERE id=:annonce_id");
    $queryVerification->execute(['annonce_id' =>$annonce_id]);
    $annonce= $queryVerification->fetch();
    if(!$annonce){
        die("Ce annonce n'existe pas");
    }
    $garage_id= $annonce['garage_id'];
    $queryDelete = $pdo->prepare("DELETE FROM annonces WHERE id=:annonce_id");
    $queryDelete->execute(['annonce_id' =>$annonce_id]);
    header("Location:garage.php?id=$garage_id");
}
else{
    die("il faut entrer un id...");
}
?>