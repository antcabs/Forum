<?php

require('actions/database.php');

if (isset($_POST['validate'])) {

    if(!empty($_POST['pseudo']) &&!empty($_POST['password'])) {
 
       $user_pseudo = htmlspecialchars($_POST['pseudo']);
       $user_password = htmlspecialchars($_POST['password']);
       
       $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo =? ');
       $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0) {

            $usersInfos = $checkIfUserExists->fetch();
            if(password_verify($user_password, $usersInfos['mdp'])) {

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                header('location: index.php');

            }else{
                $errorMsg = "votre mot de passe est incorrect";
            }
            

        }else{
            $errorMsg = "votre pseudo est incorrect";
        }
       

    }else{
       $errorMsg = "veuillez remplir tous les champs";
    }
}