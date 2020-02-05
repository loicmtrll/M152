<?php

require "connexionBd.php";


Function uploadPost($commentaire){

    $bd = connectDB();
    $insertPost = $bd->prepare("INSERT INTO post (commentaire) VALUES (?)");
    $insertPost->execute(array($commentaire));
}