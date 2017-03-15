<article class="media">
  <figure class="media-left">
    <p class="image is-32x32">
      <img src="http://bulma.io/images/placeholders/128x128.png">
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
