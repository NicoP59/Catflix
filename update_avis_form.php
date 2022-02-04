<head>

  <link rel="stylesheet" href="css/avis.css">

</head>

      <!-- bouton accueil -->
      <main id="main">
      <a href="index.php?page=acceuil" class="myButton">Accueil</a>


        <!-- <form method="POST" action="bdd/avis_insert_action.php"> -->
        <form method="POST" action="update_avis.php">

            <input type="text" name="pseudo" placeholder="pseudo" /> <br> <br>

            <textarea name="avis" id="avis" placeholder="Ecrivez ici" cols="30" rows="10"></textarea> <br> <br>

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']) ?>"> <br> <br>

            <input type="submit" value="ENVOYER"> <br> <br>

        </form>
        </main>
        <script src="js/scriptHeader.js"></script>

   