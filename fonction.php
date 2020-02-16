<?php

require "connexionBd.php";

$db = connectDB();

if (session_status() == PHP_SESSION_NONE)
{
  session_start();
}


// fonction permetant d'ajouter le commentaire à la base de données
Function uploadPost($commentaire){

    global $db;
    $insertPost = $bd->prepare("INSERT INTO post (commentaire) VALUES (?)");
    $insertPost->execute(array($commentaire));
}