<?php require_once('template/header.php'); ?>
<?php

if( $verif_co != 0){
    
    header("Location: index.php");
    
}

?>


<head>
    <link rel="stylesheet" href="css/connexion.css">
</head>

<main id="main">

    <form method="POST" action="bdd/connexion_action.php">

        <h3>Connexion</h3>

        <div class="content-form">
            <label for="email">Email *</label>
            <input type="email" name="email" required>
        </div>

        <div class="content-form">
            <label for="mdp">Mot de passe *</label>
            <input type="password" name="mdp" required>
        </div>

        <div class="content-form">
            <input type="submit" class="envoyer">
        </div>

    </form>

</main>




<?php require_once('template/footer.php'); ?>
<script src="js/scriptHeader.js"></script>