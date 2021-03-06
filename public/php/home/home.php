<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; 
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/getProfilePic.php");
?>

<html>
  <body>

    <?php include ("header.php") ?><br>


    <div class="container" style="z-index: 1">


      <div class="columns is-multiline">
        <div class="column is-one-quarter">

            <figure class="image is-250x250">
              <?php 
                getProfilePic($_SESSION['userId']);
              ?>
            </figure>
            <br><h3 class="title is-3"><strong><?php echo $fullname ?></strong> </h3>
            <div class="content">
              <h4><?php echo $user_data['city'];?></h4>
              <?php echo $user_data['description'];?>
            </div><hr>

            <h3 class="title is-5"><strong>Interests</strong> </h3>
            <div id="alltags">
              <?php
                while ( $row = $usertags->fetch_assoc()){
                  $name = $row['name'];
                  echo ("<span id=\"tag_$name\" class=\"tag is-medium is-light\"><a href=\"/tags/$name\">$name</a></span>");
                }
              ?>
            </div>

            <div class="content">
            </div><hr>
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
