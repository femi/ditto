<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/home/session.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/getProfilePic.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/add-friend-button.php");


function getUserIdFromUsername($username) {
    $connection = db_connect();
    if ($connection === false) {
        // oh dear...
        return "";
    } else {
        $username = db_quote($username);
        $result = db_query("SELECT userId FROM users WHERE username = $username");
        return $result->fetch_assoc()['userId'];
    }
}


function getNameFromUserId($userId) {
    $connection = db_connect();
    if ($connection === false) {
        // oh dear...
        return "";
    } else {

        $results = db_query("SELECT * FROM users WHERE userId = $userId");
        while ($row = $results->fetch_assoc()){

            $fName = $row['fName'];
            $lName = $row['lName'];
            $fullName = $fName." ".$lName;

            return $fullName;

        }
    }
}

?>

<html>
  <head>
  <script type="text/javascript" src="/js/sendFriendRequest.js"></script>
  </head>
  <body>

    <?php include ("header.php") ?><br>

    <div class="container">
      <div class="columns is-multiline">
        <div class="column is-one-quarter">

            <figure class="image is-250x250">
                <?php
                    $pathArray = explode('/', $_GET['uri']);
                    $userId = getUserIdFromUsername($pathArray[0]);
                    getProfilePic($userId);

                ?>
            </figure>

            <br><h3 class="title is-3"><strong><?php echo getNameFromUserId($userId); ?></strong> </h3>
            <?php 
            echo "<a href=\"mutual?id=".$userId."\" >You have <b>".mutualFriends($userId)."</b> mutual friends!<hr></a>";
            
            if (!isUserUsersFriend($userId)){
            echo buttonSelector($userId);
            echo '<hr>';
            }
            ?>

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
