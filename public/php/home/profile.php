<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/home/session.php"); 
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/getProfilePic.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual.php");

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
            <br><h3 class="title is-3"><strong><?php echo $_GET['uri']; ?></strong> </h3>
            <?php 

            echo "You have <b>".mutualFriends($userId)."</b> mutual friends!<hr>";
            

            if (isUserUsersFriend($userId)){
            }else {
              $addFriendButton = <<<BUTTON
              <center>
              <Button value="$userId" onclick="sendFriendRequest(this)" class="button is-primary is-outlined is-medium">
               <span class="icon">
                  <i class="fa fa-user"></i>
                </span>
                <span>Add Friend</span>
              </Button><hr>
              </center>
BUTTON;

              echo $addFriendButton;
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
