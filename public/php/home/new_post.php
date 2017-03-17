<?php 
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/getProfilePic.php");
?>
<article class="media">
  <figure class="media-left">
    <p class="image is-32x32">
      <?php getProfilePic($_SESSION['userId'])?>
    </p>
  </figure>
  <div class="media-content">
    <form action="/add_blog.php" method="post">
      <p class="control">
        <textarea name="blogEntry" class="textarea" placeholder="What are you excited about today <?php echo $firstname ?>?" required></textarea>
      </p>
      <p class="control">
        <input class="button is-info" type="submit" value="Post">
      </p>
    </form>
  </div>
</article>
