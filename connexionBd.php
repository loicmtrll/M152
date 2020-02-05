<?php
  //Fonction qui se connecte a la bdd.
  function connectDB()
  {

    static $db = null

    if($db == null){
      try
      {
        $db = new PDO('mysql:host=localhost;dbname=M152;charset=utf8', 'root', '');
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
    }

    return $db;

  }