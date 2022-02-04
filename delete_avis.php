<?php

$id = htmlspecialchars($_GET["id"]);

require("bdd/bddconfig.php");

try{

    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
    
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recup = $objBdd->query("DELETE FROM `avis` WHERE `id_avis` = $id ");

    header('Location: index.php');

}catch( Exception $prmE){

    die("ERREUR : " . $prmE->getMessage());

}