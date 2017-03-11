<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

<html>
  <body>

    <?php include ("header.php") ?><br>
    

    <div class="container" style="z-index: 1">


      <div class="columns is-multiline">

        <div class="column is-one-quarter">
          <div>
            <figure class="image is-250x250">
              <!-- <img class="img-rounded" src="https://avatars2.githubusercontent.com/u/7552626?v=3&u=1471a195307b622ed321e00ba61ee23adbb0d2f5&s=400"> -->
              <img class="img-rounded" src="https://s-media-cache-ak0.pinimg.com/736x/de/28/7a/de287a2e93bbe57ef5d1ec0e77c8c6a0.jpg">
            </figure>

            <br><h3 class="title is-3"><strong><?php echo $user_data['fName'] . " " . $user_data['lName'] ?></strong> </h3>
            <h5 class="title is-5"><strong>Birthday:</strong> <?php echo $user_data['dob'] ?></h5>
            <h5 class="title is-5"><strong>Email:</strong> <?php echo $user_data['email'] ?></h5>
            <!-- <p><strong>Birthday:</strong> <?php echo $user_data['dob'] ?></p>
            <p><strong>Email:</strong> <?php echo $user_data['email'] ?></p><br> -->

            <?php include ("circles.php") ?>
            <?php include ("albums.php") ?>
          </div><br>
        </div>


        <div class="column is-three-quarters">
          <!-- <br><h5 class="title is-5"> <u>Blogs</u> </h5> -->
          <?php include ("new_post.php") ?><br>
          <?php include ("post.php") ?><br>
          <?php include ("post.php") ?><br>
          <?php include ("post.php") ?><br>
        </div>
        <!-- <form action="logout.php">
          <input type="submit" value="Logout" />
        </form> -->
      </div>
    </div>
  </body>
</html>
