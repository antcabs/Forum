<?php

require('actions/database.php');
//verif que l'user compléte tous les champs
if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfUser = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));
    //
    if($checkIfUserExists->rowCount() > 0){
        //insertion de la question dans la bdd
        $userInfos = $checkIfUserExists->fetch();

        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['nom'];
        $user_firstname = $userInfos['prenom'];
        
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));

    }else{
        $errorMsg = 'Cet utilisateur n\'existe pas';
    }

}else{
    $errorMsg = 'Aucun utilisateur selectionné';
}