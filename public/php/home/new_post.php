<?php
include "$_SERVER[DOCUMENT_ROOT]/php/blogs/userbloginsert.php";

if (isset($_POST['blogEntry'])) {
  insert_blog($_SESSION['userId'], $_POST['blogEntry']);
  unset($_POST['blogEntry']);
}

?>

<article class="media">
  <figure class="media-left">
    <p class="image is-32x32">
      <img src="http://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <form action="" method="post">
      <p class="control">
        <textarea name="blogEntry" class="textarea" placeholder="What are you excited about?"></textarea>
      </p>
      <nav class="level">
        <div class="level-left">
          <div class="level-item">
            <a class="button">Upload Image</a>
          </div>
          <div class="level-item">
            <input class="button is-info" type="submit" value="Post">
          </div>
        </div>
      </nav>
    </form>
  </div>
</article>
