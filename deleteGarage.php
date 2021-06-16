<?php
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit ($_GET['id'])){
    $garage_id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $queryVerification = $pdo->prepare("SELECT * FROM garages WHERE id=:garage_id");
    $queryVerification->execute(['garage_id' =>$garage_id]);
    $garage= $queryVerification->fetch();
    if(!$garage){
        die("Ce garage n'existe pas");
    }
    $queryDelete = $pdo->prepare("DELETE FROM garages WHERE id=:garage_id");
    $queryDelete->execute(['garage_id' =>$garage_id]);
    header("Location:index.php");
}
else{
    die("il faut entrer un id...");
}
?>