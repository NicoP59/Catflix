<head>
    
    <link rel="stylesheet" href="css/article.css">

</head>

    <main id="main">  

        <?php 


            $id = $_GET['id'];

            require("bdd/bddconfig.php");
        
            try{
            
                $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
            
                $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $recup = $objBdd->query("SELECT * FROM `article`, `file` WHERE article.id = file.id_article AND article.id = $id");

            }catch( Exception $prmE){

                die("ERREUR : " . $prmE->getMessage());

            }

        ?>


        <?php
        
            while($messageSimple = $recup->fetch()){

        ?>

        <div class="box">
            
            <div class="titre-article">
            
                <h2> <?php echo stripslashes($messageSimple["titre"]); ?> </h2>
                
            </div>
            
            <div class="resume">
        
                <p> <?php echo stripslashes($messageSimple["resume"]); ?></p>  
            
            </div>

            <a href=""><img src="upload/<?php echo stripslashes($messageSimple["nom_fichier"]); ?>" alt="Film" id="film"></a>
            <div></div>

        </div>

        <?php 
        }
        ?>

    </main>
    <script src="js/scriptHeader.js"></script>
