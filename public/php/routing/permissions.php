<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// REQUIRE THE DATABASE FUNCTIONS
require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_connect.php");
require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_query.php");
require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_quote.php");

/**
 * This function returns true if the user making the incoming request is allowed to view the profile with the given username,
 * and false otherwise.
 * @param $username: the username of the profile to be viewed.
 */
function userCanViewProfile($username) {
    $connection = db_connect();

    if ($connection === false) {
        // oh dear
    }

    $username = db_quote($username);

    $query = "SELECT privacy, userId FROM users WHERE username = $username";
    $result = db_query($query);

    $row = mysqli_fetch_assoc($result);
    $privacy = $row['privacy'];
    $userId= $row['userId'];

    if ($privacy == 0) {
        // Everyone can see this profile
        return true;
    } else if ($privacy == 1 && isUserUsersFriend($userId)) {
        // Only friends can see this profile
        return true;
    } else if ($privacy == 2 && (isUserUsersFriend($userId) || isUserUsersFriendofFriend($userId))) {
        // Only friends and friends of friends can see this profile
        return true;
    } else {
        // No one can view this profile
        return false;
    }
}

/**
 *   This function returns true if the user making the incoming request is allowed to view the album with the given
 *   albumId, and false otherwise.
 */
function userCanViewAlbum ($albumId){
    $restrictionLevel = getRestrictionLevel($albumId);
    if ($restrictionLevel == 0){
        // This means the album can only be viewed by friends
        if (isUserFriend($albumId)){
            // echo 'Access Granted<br>';
            return true;
        }else{
            // echo 'Album restricted to friends only<br>';
            return false;
        }
    } else if ($restrictionLevel == 1){
        // This means the album can only be viewed by specific friendcircles
        if (isUserInCircle($albumId)){
            // echo 'Access Granted<br>';
            return true;
        }else{
            // echo 'Album restricted to certain circles only<br>';
            return false;
        }
    } else if ($restrictionLevel == 2){
        // This means the album can only be viewed by friends and friends of friends.
        if (isUserFriend($albumId) OR isUserFriendofFriend($albumId)){
            // echo 'Access Granted<br>';
            return true;
        }else{
            // echo 'Album restricted to Friends of Friends<br>';
            return false;
        }
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
        // echo 'Yes, Owner: '.$oId.' Logged in: '.$_SESSION['userId'].'<br>';
        // echo 'Returned: ';
        return true;
    } else {
        // echo 'No, Owner: '.$oId.' Logged in: '.$_SESSION['userId'].'<br>';
        // echo 'Returned: ';
        return false;
    }
}

function isUserFriend($albumId){
    // This means the album can only be viewed by friends
    // Checks if the SessionUserId is a friend of ownerId and return true
    // (userId of all in (everyone circle of (owner of given albumId)))
    $friends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId = (SELECT circleId FROM friendcircles WHERE name='everyone' AND userId = (SELECT userId FROM albums WHERE albumId=".$albumId.")))");

    while($row =$friends->fetch_assoc()){
        // echo $row['userId'];
        if ($row['userId'] == $_SESSION['userId']){
            // echo '<br>';
            // echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of owner<br>';
            // echo 'Returned: ';
            return true;
        } else {
            // echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of owner<br>';
            // echo 'Returned: ';
            // return false;
        }
    }
    return false;
}

function isUserUsersFriend($userId){
    $query ="SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId IN (SELECT circleId FROM friendcircles WHERE name='everyone' AND userId= '$userId'))";
    $friends = db_query($query);

    while ($row = $friends->fetch_assoc()) {
        if ($row['userId'] == $_SESSION['userId']) {
            return true;
        }
    }
    return false;
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
                // echo 'Yes, logged in user: '.$_SESSION['userId'].' is member of circle: '.$circleId.'<br>';
                // echo 'Returned: ';
                return true;
            } else {
                // echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a member of circle: '.$circleId.'<br>';
                // echo 'Returned: ';

                // return false;
            }
        }
        return false;
    }
}

function isUserFriendofFriend($albumId){
    // (userId of all in (everyone circle of (owner of given albumId))) ie. all friends
    $friends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId FROM friendcircles WHERE name='everyone' AND userId=(SELECT userId FROM albums WHERE albumId=".$albumId.")))");
    while($col =$friends->fetch_assoc()){
        //gets friend of friends
        $friendsoffriends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId FROM friendcircles WHERE name='everyone' AND userId=".$col['userId']."))");

        while($row =$friendsoffriends->fetch_assoc()){


            if ($row['userId'] === $_SESSION['userId']){
                // echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of friend:'.$col['userId'].'->'.$row['userId'].'<br>';
                // echo 'Returned: ';
                return true;
            } else {
                // echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of friend '.$col['userId'].'->'.$row['userId'].'<br>';
                //Do nothing
            }
        }
        return false;
    }
}

function isUserUsersFriendofFriend($userId) {
    $query = "SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId IN (SELECT circleId FROM friendcircles WHERE name = 'everyone' AND userId = '$userId'))";
    $friends = db_query($query);
    
    while($col = $friends->fetch_assoc()){
        //gets friend of friends
        $colUserId = $col['userId'];
        $friendsoffriends = db_query("SELECT userId FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId IN (SELECT circleId FROM friendcircles WHERE name = 'everyone' AND userId= $colUserId))");

        while($row = $friendsoffriends->fetch_assoc()){
            if ($row['userId'] == $_SESSION['userId']){
                // echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of friend:'.$col['userId'].'->'.$row['userId'].'<br>';
                // echo 'Returned: ';
                return true;
            } else {
                // echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of friend '.$col['userId'].'->'.$row['userId'].'<br>';
                //Do nothing
            }
        }

    }
    return false;
}


function isFriendRequestSent($userId){
    $query = "SELECT * FROM friend_requests";
    $result = db_query($query);

if ($result === false) {
            mysqli_error(db_connect());
    }
    else if (mysqli_num_rows($result) === 0) {
            return false;
    }
    else {
        while($row = $result->fetch_assoc()){
            $uId=$row['userId'];
            $fId=$row['friendId'];
            if ($uId == $userId AND $fId == $_SESSION['userId']){
                return true;
            }else{
                //continue loop
            }

        }
    }
}

?>
