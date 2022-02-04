<?php

// On récupère le pseudo du formulaire et va le convertir en chaine  
$pseudo = htmlspecialchars($_POST["pseudo"]);
// On récupère le pseudo du message et va le convertir en chaine  
$messageAdd =  htmlspecialchars($_POST["avis"]);

// On recupère le fichier avec les configuration de la base de données 
require("bddconfig.php");

// try va essayer le code avant de l'executer si erreur va dans le catch
try{

    // Connecte a la base mysql
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
    // En cas de problème renvoie dans le catch avec l'erreur
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ici on prepare notre requête SQL
    $PDOinsert = $objBdd->prepare("INSERT INTO `avis` (`pseudo`, `avis`) VALUES (:pseudo , :messageAdd) ");
    // on initialise notre :pseudo avec la variable qui récup le pseudo
    $PDOinsert->bindParam(':pseudo' , $pseudo , PDO::PARAM_STR);
    // on initialise notre :massageAdd avec la variable qui récup le massageAdd
    $PDOinsert->bindParam(':messageAdd' , $messageAdd , PDO::PARAM_STR);
    // execute la requête SQL
    $PDOinsert->execute();

    // Renvoie sur la page index.php 
    header('Location: ../index.php');

}catch( Exception $prmE){

    // Affiche le message d'erreur
    die("ERREUR : " . $prmE->getMessage());

}