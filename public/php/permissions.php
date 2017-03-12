 <?php

// REQUIRE THE DATABASE FUNCTIONS
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_connect.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_query.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_quote.php");


/**
*   This function returns true (1) if the user making the incoming request is allowed to view the album with the given
*   albumId, and false (0) otherwise.
*/
function userCanviewAlbum ($albumId){
    $restrictionLevel = getRestrictionLevel($albumId);
    if ($restrictionLevel == 0){
    // This means the album can only be viewed by friends
      if (isUserFriend($albumId)){
        echo 'Access Granted<br>';
        return 1;
      }else{
        echo 'Album restricted to friends only<br>';
        return 0;
      }  

    } else if ($restrictionLevel == 1){
    // This means the album can only be viewed by specific friendcircles
      if (isUserInCircle($albumId)){
        echo 'Access Granted<br>';
        return 1;
      }else{
        echo 'Album restricted to certain circles only<br>';
        return 0;
      } 
    } else if ($restrictionLevel == 2){
    // This means the album can only be viewed by friends and friends of friends.
      if (isUserFriend($albumId) OR isUserFriendofFriend($albumId)){
        echo 'Access Granted<br>';
        return 1;
      }else{
        echo 'Album restricted to Friends of Friends<br>';
        return 0;
      }
        
    } else {
        
    }
}



function getRestrictionLevel($albumId){
     $result = db_query("SELECT isRestricted FROM albums WHERE albumId =".$albumId);
        $row = $result->fetch_assoc();
        $privacy = $row['isRestricted'];
        return $privacy;
}


function isUserOwner($albumId){
 // if owner logged
    $ownerId = db_query("SELECT userId FROM albums WHERE albumId=".$albumId);
    $row = $ownerId->fetch_assoc();
    $oId = $row['userId'];
    
    if ($oId == $_SESSION['userId']){ 
        echo 'Yes, Owner: '.$oId.' Logged in: '.$_SESSION['userId'].'<br>';
        echo 'Returned: ';
        return 1;
    } else {
        echo 'No, Owner: '.$oId.' Logged in: '.$_SESSION['userId'].'<br>';
        echo 'Returned: ';
        return 0;
    }


}


function isUserFriend($albumId){
            // This means the album can only be viewed by friends 
            // Checks if the SessionUserId is a friend of ownerId and return true 
            // (userId of all in (everyone circle of (owner of given albumId)))
            $friends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=(SELECT userId FROM albums WHERE albumId=".$albumId.")))");

                while($row =$friends->fetch_assoc()){
                    // echo $row['userId'];
                    if ($row['userId'] == $_SESSION['userId']){
                        echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of owner<br>';
                        echo 'Returned: ';
                        return 1;
                    } else {
                        echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of owner<br>';
                        // echo 'Returned: ';
                        // return 0;
                    }
                }
}

function isUserInCircle($albumId){
            // This means the album can only be viewed by specific friendcircles
            //So get the album_friendcircles and then check if the sessionUserId and return true if so

            // (gets circleId's of all circles which are allowed access to current album album)
             $circles = db_query("SELECT circleId FROM album_friendcircles WHERE albumId=".$albumId);
             while ($col=$circles ->fetch_assoc()){
                $circleId = $col['circleId'];
                //(gets all users in each circle)
                $circleMembers = db_query("SELECT userId FROM friendcircle_users WHERE circleId=".$circleId);

                    while ($row=$circleMembers ->fetch_assoc()){
                        if ($row['userId'] == $_SESSION['userId']){
                            echo 'Yes, logged in user: '.$_SESSION['userId'].' is member of circle: '.$circleId.'<br>';
                            echo 'Returned: ';
                            return 1;
                        } else {
                            echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a member of circle: '.$circleId.'<br>';
                            // echo 'Returned: ';
                            
                            // return 0;
                        }
                    }

             }
}

function isUserFriendofFriend($albumId){
                // (userId of all in (everyone circle of (owner of given albumId))) ie. all friends
            $friends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=(SELECT userId FROM albums WHERE albumId=".$albumId.")))");
            while($col =$friends->fetch_assoc()){
                        //gets friend of friends
                        $friendsoffriends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$col['userId']."))");

                            while($row =$friendsoffriends->fetch_assoc()){


                                if ($row['userId'] == $_SESSION['userId']){
                                     echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of friend:'.$col['userId'].'->'.$row['userId'].'<br>';
                                     echo 'Returned: ';
                                    return 1;
                                } else {
                                    echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of friend '.$col['userId'].'->'.$row['userId'].'<br>';
                                    //Do nothing
                                }
                            }
                    
                    }
}


/////////// Issues
// returning 0 only loops once so need to get rid of it or implement some other way

?>

Album Restriction Level:<br>
<?php echo getRestrictionLevel(5)?><br><br>

Is user the owner?<br>
<?php echo isUserOwner(5)?><br><br>

Is user a friend of the owner:<br>
<?php echo isUserFriend(5)?><br><br>

Is user in selected friend circle?<br>
<?php echo isUserInCircle(5)?><br><br>

Is user a friend of a friend?<br>
<?php echo isUserFriendofFriend(5)?><br><br>
<br><br>
User Authentication:: <br>
<?php echo userCanviewAlbum(5) ?>
