<?php

session_start();

$email = htmlspecialchars(strtolower($_POST["email"]));
$password_clair =  htmlspecialchars(strval($_POST["mdp"]));

try{

   
    if($email != ""  && $password_clair != "") {
    
        require('bddconfig.php');
    
       
        $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
       
        $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $PDOlistlogins = $objBdd->prepare("SELECT * FROM users WHERE email = :email ");
       
        $PDOlistlogins->bindParam(':email', $email, PDO::PARAM_STR);
      
        $PDOlistlogins->execute();
    
        
        $row_userweb = $PDOlistlogins->fetch();
    
        if ($row_userweb != false) {
    
        
            if (password_verify($password_clair, $row_userweb['mdp'])) {
               
                $session_data = array(
                    'id' => $row_userweb['id'],
                    'pseudo' => $row_userweb['pseudo'],
                    
                    'email' => $row_userweb['email'],
                );
    
   
                session_regenerate_id();
                
                $_SESSION['logged_in'] = $session_data;
                
                $PDOlistlogins->closeCursor();
    
                header("Location: ../index.php");
    
            } else {
                
                session_destroy();
                die('Authentification incorrecte');
            }
    
        } else {
           
            session_destroy();
            die('Authentification incorrecte');
        }
    
    } else {
        header("Location: ../connexion.php");
    }
    

}catch( Exception $prmE){

    die("Erreur" . $prmE->getMessage());


}
