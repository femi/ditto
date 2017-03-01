<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>
<html>
  <body>

    <?php include ("header.php") ?><br>

    <div class="container">
      <div class="columns is-multiline">

        <div class="column is-one-quarter">
          <div>
            <figure class="image is-250x250">
              <img class="img-rounded" src="https://avatars2.githubusercontent.com/u/7552626?v=3&u=1471a195307b622ed321e00ba61ee23adbb0d2f5&s=400">
            </figure>

            <br><h3 class="title is-3"><strong><?php echo $user_data['fName'] . " " . $user_data['lName'] ?></strong> </h3>
        </div><br>

        </div>


        <div class="column is-three-quarters">
          <br><h5 class="title is-5"> <u>Blogs</u> </h5>
          <?php include ("post.php") ?><br>


        </div>

        <div class="column is-one-quarter">
          <?php include ("circles.php") ?>
          <?php include ("albums.php") ?>

          <form action="logout.php">
            <input type="submit" value="Logout" />
          </form>
        </div>



      </div>
    </div>



    <!-- <div class="container">
      <div class="columns is-multiline">

        <div class="column is-one-quarter">
          <figure class="image is-250x250">
            <img class="img-rounded" src="https://avatars2.githubusercontent.com/u/7552626?v=3&u=1471a195307b622ed321e00ba61ee23adbb0d2f5&s=400">
          </figure>
          <br><h3 class="title is-3"> <?php //echo $user_data['fName'] . " " . $user_data['lName'] ?> </h3>
        </div>

        <div class="column is-three-quarters">
            <?php //include ("post.php") ?><br>
        </div>

        <div class="column is-one-quarter">
            <?php //include ("circles.php") ?><br>
        </div> -->

        <!-- <div class="column is-three-quarters">
        </div> -->




  </body>
</html>
