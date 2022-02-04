<?php require_once('template/header.php'); ?>
<?php


if( $verif_co == 0){
    
    header("Location: index.php");
    
}

?>


<head>
    <link rel="stylesheet" href="css/mon_compte.css">
</head>

<main id="main">

    
    <form id="form" method="POST" action="bdd/update_action.php">
        
        <h3> Mon compte </h3>
            
       

        <div class="content-form">
            <label for="pseudo">Pseudo *</label>
            
            <input type="text" name="pseudo" value="<?php echo $_SESSION["logged_in"]["pseudo"] ?>" required>
        </div>

        <div class="content-form">
            <label for="email">Email *</label>
            
            <input type="email" name="email" value="<?php echo $_SESSION["logged_in"]["email"] ?>" required>
        </div>

        <p class="text">Créer un nouveau mot de passe </p>

        <div class="content-form">
            <label for="mdp">Nouveau Mot de passe *</label>
            <input type="password" name="mdp">
        </div>

        <div class="content-form">
            <label for="mdp2">Confirmer le nouveau mot de passe *</label>
            <input type="password" name="mdp2">
        </div>

        <div class="content-form">
            <input type="submit" value="Envoyer"  class="envoyer">
        </div>
        
        
    </form>

</main>

<?php require_once('template/footer.php'); ?>


<script src="js/scriptHeader.js"></script>

