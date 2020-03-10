<?php

require "fonction.php";
$erreur = "";

if(filter_has_var(INPUT_POST,'btnSubmit')){  
    
    $commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);

    if(!$commentaire || $commentaire == ""){
      $erreur .= "Veuillez rajouter un commentaire<br/>";
    }

    $nbImg = $_FILES['img']['name'];
    if ($nbImg[0] == "") 
    {
      $erreur .= "Veuillez rajouter au moins une image<br/>";
    }
   

    if($erreur == ""){

      $countfiles = count($_FILES['img']['name']); 
      $path = 'img/';         
      $maxSize = 3000000;                                 
      $extensions = array('.png', '.gif', '.jpg', '.jpeg');  
      //$idPost = uploadPost($commentaire); 

      for($i=0;$i<$countfiles;$i++)
      {
        
        $filename = $_FILES['img']['name'][$i];                 
        $extension = strrchr($filename, '.');                   
        $size = filesize($_FILES['img']['tmp_name'][$i]);   


        $arr = explode(".", $filename, 2);
        $nomFichierSansLeType = $arr[0]/*.$idPost*/;               
        $fichier = $nomFichierSansLeType . $extension;            

        if(!in_array($extension, $extensions)) 
        {
            $erreur .= "Le fichier envoyé n'est pas du bon type<br/>";
        }

        if($size>$maxSize)
        {
            $erreur .= "La taille depasse la taille maximun<br/>";
        }
        
        if($erreur =="")
        {
            //Remplacer tout les accents.
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            // Uploads les fichier si la fonction renvoie TRUE.
            if(move_uploaded_file($_FILES['img']['tmp_name'][$i], $path . $fichier)) 
            {          
                $erreur .= "Upload Reussi";
                //echo $idPost;
               // ajouterMedia($nomFichierSansLeType,$extension,$idPost);       creer fonction d'ajout a la base de donnée        
            }
            else 
            {      
                $erreur .= "L'upload a échoué";
            }
        }
      }
  }
}

?>

<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="">Description</label>
    <textarea name="commentaire" required rows="4" cols="50" style="height:250px;resize: none;">
    </textarea>

    <input type="file" name="img[]" multiple >


    <br><br><br>
    <input type="submit" value="submit" name="btnSubmit">
  </form>
  <?php
    echo $erreur;  
   ?>
</div>