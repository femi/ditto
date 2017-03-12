<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

<html>
  <body>

    <?php include ("header.php") ?><br>

    <div class="container">
      <div class="columns is-multiline">
        <div class="column is-one-quarter">

            <figure class="image is-250x250">
              <img class="img-rounded" src="https://s-media-cache-ak0.pinimg.com/736x/de/28/7a/de287a2e93bbe57ef5d1ec0e77c8c6a0.jpg">
            </figure>
            <br><h3 class="title is-3"><strong><?php echo $_GET['uri']; ?></strong> </h3><hr>

            <?php include ("circles.php") ?>
            <?php include ("albums.php") ?>

        </div>

        <div class="column is-three-quarters">
          <?php include ("profilePosts.php") ?><br>
        </div>

      </div>
    </div>
  </body>
</html>
