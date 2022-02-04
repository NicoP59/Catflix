<head>

    <link rel="stylesheet" href="css/accueil.css">

</head>

<body>
    
<main id="main">

    <div id="titre-films">

        <h1>Les films</h1>

    </div>

    <!-- articles des films -->
    <?php

        require("bdd/bddconfig.php");

        try {

            $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);

            $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $recup = $objBdd->query("SELECT * FROM `article`, `file` WHERE article.id = file.id_article ");
        } catch (Exception $prmE) {

            die("ERREUR : " . $prmE->getMessage());
        }

    ?>


    <div class="content-articles">

        <?php

            while ($messageSimple = $recup->fetch()) {

        ?>

            <figure class="snip1361 titre_img"> 

                <figcaption>

                    <a href="index.php?page=affichage_article&id=<?php echo $messageSimple["id"] ?>">

                    <h1><?php echo stripslashes($messageSimple["titre"]); ?></h1>

                </figcaption>

                <div>

                    <img class="imag" src="upload/<?php echo stripslashes($messageSimple["nom_fichier"]); ?>" alt="">

                </div>

            </figure>

        <?php
            }
        ?>

    </div>

    <!-- avis -->
    <a href="index.php?page=nouvel_avis&id=modif_pour_mettre_id_user"  class="new_avis">Donnez-nous votre avis</a>

    <?php

        require("bdd/bddconfig.php");

        try {

            $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);

            $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $recup = $objBdd->query("SELECT * FROM `avis`");
        } catch (Exception $prmE) {

            die("ERREUR : " . $prmE->getMessage());
        }

    ?>

    <div class="content-avis">

        <?php

            while($messageSimple = $recup->fetch()){

        ?>

            <div class="box2">
                
                <div class="pseudo">
                        
                    <h2> <?php echo stripslashes($messageSimple["pseudo"]); ?> </h2>

                </div>

                <div class="avis">
                    
                    <p> <?php echo stripslashes($messageSimple["avis"]); ?></p>
                        
                    <a href="delete_avis.php?id=<?php echo $messageSimple["id_avis"] ?>">Supprimer</a>

                    <a href="index.php?page=update_avis_form&id=<?php echo $messageSimple["id_avis"] ?>">Modifier</a>
                    
                </div>

            </div>

        <?php 
            }
        ?>

    </div>

</main>

<script src="js/scriptfig.js"></script>
</body>