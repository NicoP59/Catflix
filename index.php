<?php 


session_start(); 


if( isset($_SESSION["logged_in"])){
    
    $verif_co = $_SESSION["logged_in"]["id"];

}else{
 
    $verif_co = 0;

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/template.css">
    <title>Webflix</title>
</head>
<body>



<?php require_once('template/header.php'); ?>


<?php



if(isset($_GET['page']) && file_exists($_GET['page'].'.php') ){
    
    require_once($_GET['page'] .".php");

}else{
    
    require_once('accueil.php');

}

?>


<?php require_once('template/footer.php'); ?>



</body>
</html>