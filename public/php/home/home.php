<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

<html>
  <body>

    <?php include ("header.php") ?><br>
    

    <div class="container" style="z-index: 1">


      <div class="columns is-multiline">
        <div class="column is-one-quarter">

            <figure class="image is-250x250">
              <img class="img-rounded" src="https://s-media-cache-ak0.pinimg.com/736x/de/28/7a/de287a2e93bbe57ef5d1ec0e77c8c6a0.jpg">
            </figure>
            <br><h3 class="title is-3"><strong><?php echo $fullname ?></strong> </h3><hr>

            <h3 class="title is-5"><strong>Privacy</strong> </h3>
              <?php include ("privacy.php") ?>
            <hr>

            <?php include ("circles.php") ?>
            <?php include ("albums.php") ?>

        </div>

        <div class="column is-three-quarters">
          <?php include ("new_post.php") ?><br>
          <?php include ("post.php") ?><br>
        </div>

      </div>
    </div>
  </body>
</html>
