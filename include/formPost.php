

<div class="container">
  <form action="./actionPost.php" method="POST">

    <label for="">Description</label>
    <textarea name="commentaire" required rows="4" cols="50" style="height:250px;resize: none;">
    </textarea>

    <label for="img">Fichier image</label><br>
    <input type="file" name="img[]" accept="image/*" required>


    <br><br><br>
    <input type="submit" value="Submit">
  </form>
</div>