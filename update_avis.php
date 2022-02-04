<?php

$id = htmlspecialchars($_POST["id"]);
echo $id;

$pseudo = htmlspecialchars(addslashes($_POST["pseudo"]));
$messageAdd = htmlspecialchars(addslashes($_POST["avis"]));

require("bdd/bddconfig.php");

try{

    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
 
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recup = $objBdd->prepare("UPDATE `avis` SET `pseudo` = :pseudo , `avis` = :messageAdd WHERE `id_avis` = $id ");
    
    $recup->bindParam(':pseudo' , $pseudo , PDO::PARAM_STR);
    
    $recup->bindParam(':messageAdd' , $messageAdd , PDO::PARAM_STR);
   
    $recup->execute();
    
    header('Location: index.php');

}catch( Exception $prmE){

    // Affiche le message d'erreur
    die("ERREUR : " . $prmE->getMessage());

}