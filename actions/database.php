<?php
try {
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Une erreur a été trouvé'. $e->getMessage());
}