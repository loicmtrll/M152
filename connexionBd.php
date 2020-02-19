<?php

require_once "informationBd.php";
  //Fonction qui se connecte a la bdd.
  function connectDB()
  {

    static $db = null;

    if($db === null){
      try 
      {
          $db = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE_NAME, PSEUDO, PWD, array('charset' => 'utf8'));
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } 
      catch (PDOException $e) 
      {
          die('Erreur : ' . $e->getMessage());
      }
    }

    return $db;

  }