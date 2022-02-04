<head>
    <link rel="stylesheet" href="css/avis.css">
</head>

<!-- C du crud / CREER nouvel avis -->

<!-- A styliser -->
<!-- <a href="index.php?page=acceuil">Retour vers l'accueil</a> -->


    <!-- bouton accueil -->
    <main id="main">
    <a href="index.php?page=acceuil" class="myButton">Accueil</a>


        <form method="POST" action="bdd/avis_insert_action.php">

            <input type="text" name="pseudo" placeholder="Pseudo" />    <br> <br>

            <textarea name="avis" id="avis" placeholder="Écrivez ici..." cols="30" rows="10"></textarea>     <br> <br>

            <input type="submit" value="Envoyer" class="envoyer">   <br> <br>

        </form>


</main>
<script src="js/scriptHeader.js"></script>
