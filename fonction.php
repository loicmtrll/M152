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
    $insertPost = $db->prepare("INSERT INTO post (commentaire) VALUES (?)");
    $insertPost->execute(array($commentaire));

    $last_id = $db->lastInsertId();

    return $last_id;
}

// permet d'ajouter un media a la base de données
Function uploadMedia($nomMedia,$extensionMedia,$id){

  global $db;
  $insertMedia = $db->prepare("INSERT INTO `media`( `nomFichierMedia`, `typeMedia`, `idPost`) VALUES (?,?,?)");
  $insertMedia->execute(array($nomMedia,$extensionMedia,$id));  
}

Function recupAllPosts(){
  global $db;
  $recupPosts = $db->prepare("SELECT p.idPost,p.commentaire,p.creationDate,m.idMedia,m.nomFichierMedia,m.typeMedia FROM post as p, media as m WHERE p.idPost = m.idPost");
  $recupPosts->execute(); 


  return $recupPosts;
} 

Function deletePost($id){
  global $db;
  $delMedia = $db->prepare("DELETE FROM `media` WHERE `idPost` = ?");
  $delMedia->execute(array($id)); 

  $delPost = $db->prepare("DELETE FROM `post` WHERE `idPost` = ?");
  $delPost->execute(array($id));
}

function getPostById($id){
  global $db;
  $reqPost = $db->prepare("SELECT * FROM `post` WHERE `idPost` = ?");
  $reqPost->execute(array($id)); 
  $reqPost = $reqPost->fetch();

  return $reqPost;
}

function modifPost($commentaire,$id){
  global $db;
  $updatePost = $db->prepare("UPDATE `post` SET `commentaire`= ? WHERE `idPost` = ?");
  $updatePost->execute(array($commentaire,$id)); 
}

