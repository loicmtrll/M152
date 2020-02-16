<?php
if(filter_has_var(INPUT_POST,'btnSubmit')){
    echo $_FILES['imageUpload']['tmp_name'];

    /*if(move_uploaded_file($_FILES['imageUpload']['tmp_name'],"./img/".$_FILES['imageUpload']['name'])){
      header("Location: index.php");
    }*/

}

?>

<div class="container">
  <form action="" method="POST">

    <label for="">Description</label>
    <textarea name="commentaire" required rows="4" cols="50" style="height:250px;resize: none;">
    </textarea>

    <label for="imageUpload">Fichier image</label><br>
    <input type="file" name="imageUpload"  enctype="multipart/form-data">


    <br><br><br>
    <input type="submit" value="submit" name="btnSubmit">
  </form>
</div>
<!--accept="image/*" -->