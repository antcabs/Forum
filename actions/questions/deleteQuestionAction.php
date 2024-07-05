<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('location: ../../login.php');
}

require('../database.php');
//verification de la complétion des champs
if(isset($_GET['id']) &&!empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur  FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));
    //insertion dans la base de donné pour supprimer la question
    if($checkIfQuestionExists->rowCount() > 0) {
        
        $questionsInfos = $checkIfQuestionExists->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){
            
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfQuestion));

            header('location:../../my-questions.php');
        }else{
            echo "vous n'avez pas le droit de supprimer cette question";
        }

    }else{
        echo "vous n'êtes pas l'auteur de cette question";
    }

}else{
    echo "aucune question n'a été trouvé";
}