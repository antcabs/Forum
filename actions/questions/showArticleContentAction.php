<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));
    //preparation bdd pour affichage des questions
    if($checkIfQuestionExists->rowCount() > 0){

        $questionsInfos = $checkIfQuestionExists->fetch();

        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

    }else{
        $errorMsg =  "Aucune question trouvée";
    }

}else{
    $errorMsg = "Aucune question trouvée";
}