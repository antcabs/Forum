<?php
session_start();
require_once ('actions/database.php');

if (isset($_POST['validate'])) {
    //verif que l'user compléte tous les champs
     if(!empty($_POST['pseudo']) &&!empty($_POST['lastname']) &&!empty($_POST['firstname']) &&!empty($_POST['password'])) {
        //données de l'user qui va s'inscrire sur le site
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo =?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));
        //verif que le pseudo n'existe pas déjà sur le site
        if($checkIfUserAlreadyExists->rowCount() == 0){

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password)) ;

            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom= ? AND prenom =? AND pseudo =?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
            //recupération des infos de l'user qui vient de s'inscrire sur le site
            $usersInfos = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            header('location: index.php');

        }else{
            $errorMsg = "Ce pseudo est déjà utilisé";
        }

    }else{
        $errorMsg = "veuillez remplir tous les champs";
    }
}