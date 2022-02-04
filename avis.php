<head>
    <link rel="stylesheet" href="css/avis.css">
</head>

<!-- R du crud / READ nouvel avis -->


<!-- A styliser -->

<a href="index.php?page=accueil">Retour l'accueil</a>
<a href="index.php?page=nouvel_avis&id=modif_pour_mettre_id_user"  class="new_avis">Donner son Avis</a>
<?php 

// Recup l'id dans l'url
$id = $_GET['id'];

 // On recupère le fichier avec les configuration de la base de données 

require("bdd/bddconfig.php");

try{
     // Connecte a la base mysql
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
     // En cas de problème renvoie dans le catch avec l'erreur
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // ici on prepare notre requête SQL pour l'affichage d'un commentaire 
     $recup = $objBdd->query("SELECT * FROM `avis` WHERE `id` = $id ");

}catch( Exception $prmE){

     // Affiche le message d'erreur
    die("ERREUR : " . $prmE->getMessage());

}

?>


<?php
    // Boucle while qui va afficher nos messages
    // le $recup->fetch() va renvoyer tout nos messages
    while($messageSimple = $recup->fetch()){

?>

    <div class="box">
        
        <div class="pseudo-date">
            <!-- On affiche le pseudo de l'utilisateur -->
            <h2> <?php echo stripslashes($messageSimple["pseudo"]); ?> </h2>
            <!-- On affiche la date de création du message -->
            <p> <?php echo $messageSimple["date"]; ?> </p>
        </div>
        <div class="avis">
            <!-- On affiche le message de l'utilisateur -->
            <p> <?php echo stripslashes($messageSimple["avis"]); ?></p>



            
            <a href="delete_message.php?id=<?php echo $messageSimple["id"] ?>">Supprimer</a>

            <a href="formulaire_update.php?id=<?php echo $messageSimple["id"] ?>">Modifier</a>
        
        </div>

    </div>


<?php 
}
?>
