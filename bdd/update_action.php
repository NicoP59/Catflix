<?php

session_start();

$id = htmlspecialchars($_SESSION["logged_in"]["id"]);

$pseudo = htmlspecialchars($_POST["pseudo"]);
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["mdp"]);
$cpassword = htmlspecialchars($_POST["mdp2"]);


try {
    
    require("../bdd/bddconfig.php");

  
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
    
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if($password == "" && $cpassword == ""){

    
       
        $_SESSION["logged_in"]["pseudo"] = $pseudo;
        $_SESSION["logged_in"]["email"] = $email;

        
        $recup = $objBdd ->prepare("UPDATE `users` SET `pseudo` = :pseudo, `email` = :email  WHERE id = $id");
      
        
        
        $recup->bindParam(':pseudo' , $pseudo , PDO::PARAM_STR);
      
        $recup->bindParam(':email' , $email , PDO::PARAM_STR);
      
        $recup->execute();
    
    
    }else{
    
        
        if($password == $cpassword){

      
           
            $_SESSION["logged_in"]["pseudo"] = $pseudo;
            $_SESSION["logged_in"]["email"] = $email;
    
           
            $password = password_hash($password , PASSWORD_BCRYPT);

           
            $recup = $objBdd ->prepare("UPDATE `users` SET `pseudo` = :pseudo, `email` = :email , `mdp` = :mdp WHERE id = $id");
           
            
         
            $recup->bindParam(':pseudo' , $pseudo , PDO::PARAM_STR);
            
            $recup->bindParam(':email' , $email , PDO::PARAM_STR);
           
            $recup->bindParam(':mdp' , $password , PDO::PARAM_STR);
            
            $recup->execute();

        }
    
    }
    
} catch(Exception $prmE) {
        die("Erreur : " . $prmE->getMessage());
}

header("Location: ../index.php");


