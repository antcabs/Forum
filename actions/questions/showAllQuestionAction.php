<?php

require('actions/database.php');

$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

if(isset($_GET['search']) &&!empty($_GET['search'])){

    $usersSearch = $_GET['search'];

    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%"  ORDER BY id DESC');



}