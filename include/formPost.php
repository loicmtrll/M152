<?php

require "fonction.php";
$erreur = "";

if(filter_has_var(INPUT_POST,'btnSubmit')){
    
    
    $commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);

    if(!$commentaire || $commentaire == ""){
      $erreur .= "Veuillez rajouter un commentaire";
    }

    $nbImg = $_FILES['img']['name'];
    if ($nbImg[0] == "") 
    {
      $erreur .= "Veuillez rajouter au moins une image";
    }

    if($erreur == ""){

      $countfiles = count($_FILES['img']['name']); 
      $path = 'img/';         
      $maxSize = 3000000;                                 
      $extensions = array('.png', '.gif', '.jpg', '.jpeg');  
      $filename = $_FILES['img']['name']; 
      
      move_uploaded_file($_FILES['img']['tmp_name'], $path . $filename);

      //$idPost = uploadPost($commentaire);

      /*for($i=0;$i<$countfiles;$i++)
        {
        $filename = $_FILES['img']['name'][$i];                 
        $extension = strrchr($filename, '.');                    
        $size = 5;//filesize($_FILES['img']['tmp_name'][$i]);   
        
        if(!in_array($extension, $extensions)) 
        {
          $erreur .= "Pas la bonne extension";
        }

        if($size>$maxSize)
        {
          $erreur .= "Image trop grande";
        }
            if(move_uploaded_file($_FILES['img']['tmp_name'][$i], $path . $filename)) 
            {          
                $erreur .= "Upload réussi";
              //  ajouterMedia($nomFichierSansLeType,$extension,$idPost);
            }
            else 
            {      
              $erreur .= "Upload échoué";
            }
      }*/

    
  }
}

?>

<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="">Description</label>
    <textarea name="commentaire" required rows="4" cols="50" style="height:250px;resize: none;">
    </textarea>

    <input type="file" name="img">


    <br><br><br>
    <input type="submit" value="submit" name="btnSubmit">
  </form>
  <?php echo $erreur; ?>
</div>