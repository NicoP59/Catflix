<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <!-- <link rel="stylesheet" href="css/accueil.css"> -->
    <title>Header</title>

</head>


    <header>
        <div class="darkconnect">
            <!-- <div class="switch">
                <i class="fas fa-moon"></i>
                <div class="btn"></div>
            </div> -->
            <div class ="buttonDarkMode" id= "theme_toggler">
	            <input type="checkbox" class="checkbox" id="chk" />
	            <label class="theme_toggler" for="chk">
                    <div class="sun">☀️</div>
		            <div class="moon">🌙</div>
		            <div class="ball"></div>
	            </label>
            </div>
        </div>    
            <p class="connexion"></p>
            <div class="link">

        <div class="inscriptionetc">       
            <a href="index.php?page=accueil">Accueil</a>
            <a href="index.php?page=inscription">Inscription</a>
            <a href="index.php?page=connexion">Connexion</a>
        </div> 

<?php

if( $verif_co == 0 ){
?>


<?php 
}else{

?>
        <div class="inscriptionetc2">  
    <a href="index.php?page=mon_compte">Mon compte</a>
    <a href="index.php?page=deconnexion">Déconnexion</a>
    </div> 
<?php 
}
?>    

        <div>
            <img src="img/catflix.png" alt="" id="img-catflix" >
            <p class="typewriter" id="type-js-auto"></p> <br>
        </div>

<?php  

    if( $verif_co != 0){
    ?>    
    
        <div class="nom"> 

            <?php echo "Bonjour " . $_SESSION["logged_in"]["pseudo"]; ?>

        </div>

<?php
}
?>


        
</header>

<script src="js/scriptHeader.js"></script>


</html>