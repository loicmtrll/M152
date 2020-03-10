<?php 
    require "fonction.php";
   
    ?>
<!DOCTYPE html>
<html>
<title>Page principale</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Fermer Menu</a>
  <a href="post.php" onclick="w3_close()" class="w3-bar-item w3-button">Post</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-center w3-padding-16">Home</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<hr>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

   <!-- About Section -->
   <div class="w3-container w3-padding-32 w3-center">  
    <h3>Votre profil</h3><br>
    <div class="w3-padding-32">
    <img src="img/pdp.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="150" height="150">
      <h4><b>Métrailler Loïc</b></h4>
      <h6><i></i></h6>
      <?php
  
          

         /* $posts = $resultat->fetch();
          foreach ($posts as $key => $value) {
            echo $key."<br>";
            echo $value."<br>";
          }*/
  ?>
      <p></p>
    </div>
  </div>
  <hr>

  <!-- First Photo Grid-->




  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <?php
      $resultat = recupAllPosts();
      while ($posts = $resultat->fetch()) {
        echo '<div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">          
          <img src="img/'.$posts['nomFichierMedia'].$posts['typeMedia'].'" alt="" style="width:100%">
          <div class=" w3-black w3-padding">'.$posts['commentaire'].'</div>
        </div>
      </div>';
      }
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

<!-- End page content -->
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