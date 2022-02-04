<?php 



$pseudo = htmlspecialchars($_POST["pseudo"]);
$email = htmlspecialchars(strtolower($_POST["email"]));
$password_clair =  htmlspecialchars(strval($_POST["mdp"]));
$confirm_password = htmlspecialchars(strval($_POST["mdp2"]));


if( $pseudo != ""  && $email != ""  && $password_clair != ""  && $confirm_password != "") {

    
    if( $password_clair == $confirm_password){

       
        $hash_password = password_hash( $password_clair, PASSWORD_BCRYPT);

        require("bddconfig.php");

        try {

           
            $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);  
            
            $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $PDOinsertuserweb = $objBdd->prepare("INSERT INTO  `users` ( pseudo, email, mdp) VALUES ( :pseudo, :email, :password)");
       
            
           
            $PDOinsertuserweb->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            
            $PDOinsertuserweb->bindParam(':email', $email, PDO::PARAM_STR);
           
            $PDOinsertuserweb->bindParam(':password', $hash_password, PDO::PARAM_STR);
            
            $PDOinsertuserweb->execute();

            header("Location: ../index.php");
    
        } catch (Exception $prmE) {
            die('Erreur : ' . $prmE->getMessage());
        }

    }

}else{
    header("Location: ../inscription.php");
}
