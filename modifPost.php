<?php
require "fonction.php";
$erreur ="";
$id = $_GET['id'];

if(isset($id) && $id != ""){
    $post = getPostById($id);
}else{
    header("Location: index.php");
}


if(filter_has_var(INPUT_POST,'btnSubmit')){  
    $commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
    if(!$commentaire || $commentaire == ""){
        $erreur .= "Veuillez rajouter un commentaire<br/>";
      }else{
          modifPost($commentaire,$id);
          header("Location: index.php");
      }
}

?>

<!DOCTYPE html>
<html>
<title>Page principale</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="./css/formPost.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}

</style>
<body>



<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-center w3-padding-16"><a href="index.php">Home</a></div>
  </div>
</div>
  

<hr>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


  <hr>
  <div class="container">
  <form action="" method="POST">

    <label for="">Commentaire</label>
    <input type="text" name="commentaire" value="<?php echo $post['commentaire'];?>">


    <br><br><br>
    <input type="submit" value="Modifier" name="btnSubmit">
  </form>
  <?php
    echo $erreur;  
   ?>
</div>
    
  
  <hr id="about">

 
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>© Loïc Métrailler</h3>
      <p>Site web dans le cadre du module M152.</p>
      <p>Le site permet d'upload des posts et les gerer comme un mini reseau social</p>
    </div>  
  </footer>

</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>