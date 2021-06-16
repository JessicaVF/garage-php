<?php
    $name = null;
    $price = null;
    $garage_Id = null;

    if(!empty($_POST['garage_Id']) && ctype_digit($_POST['garage_Id'])) {
        $garage_Id = $_POST['garage_Id'];
    }
    if(!empty($_POST['price'])&& ctype_digit($_POST['price'])){
        $price = $_POST['price'];
    } 
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }
    if( !$garage_Id || !$name || !$price ){
        die("formulaire mal rempli");
    }
    $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $queryVerification = $pdo->prepare("SELECT * FROM garages WHERE id=:garage_id");
    $queryVerification->execute(['garage_id' =>$garage_Id]);
    $garage= $queryVerification->fetch();
    if(!$garage){
        die("Ce garage n'existe pas");
    }
    $queryAdd = $pdo->prepare("INSERT INTO annonces (name, price, garage_id) VALUES (:name, :price, :garage_id)");
    $queryAdd->execute(['name' =>$name, 'price' =>$price, 'garage_id' =>$garage_Id]);   
    header("Location:garage.php?id=$garage_Id");
