<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function getPhotoComments() {
    print_r($_REQUEST);
    // Get data from requests and escape it.
    $albumId = $_REQUEST['albumId'];
    $photoName = $_REQUEST['filename'];

    $albumId = db_quote($albumId);
    $photoName = db_quote($photoName);

    $albumId= substr($albumId, 1, strlen($albumId) - 2);
    $photoName = substr($photoName, 1, strlen($photoName) - 2);
        
    $connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

    // get photoId
    $query = "SELECT photoId FROM photos WHERE albumId = $albumId AND filename = '$photoName' LIMIT 1";
    $queryResult = db_query($query);

    if ($queryResult === false) {
        echo mysqli_error(db_connect());
        return;
    } else {
    
        $row = mysqli_fetch_row($queryResult);
        $photoId = $row[0];

	    // build comment getter query
        
	    $query = "SELECT userId, updatedAt, message FROM comments WHERE photoId = $photoId";
	    $qry_result = db_query($query);

	    if ($qry_result === false) {
	        echo mysqli_error(db_connect());
	        return;
	    } else {

            echo "<div id=\"comments-list\">";
            while ($row = $qry_result->fetch_assoc()) {
                $userId = $row['userId'];
                $message = $row['message'];
                $updatedAt = $row['updatedAt'];

                // get the user's username...
                $queryResult = db_query("SELECT username FROM users WHERE userId = $userId");
                $userName = mysqli_fetch_assoc($queryResult)['username'];

                echo "<div class=\"box\"><article class=\"media\"><div class=\"media-left\"><figure class=\"image is-32x32\"><img src=\"../resources/album_content/$userId/$albumId/$pho      toName\"></figure></div><div class=\"media-content\"><div class=\"content\"><p><strong>$userName</strong><small>$updatedAt</small><br>$message</p></div></div></article></div>";
            }
            echo "</div>";
        }

    }
    
}
getPhotoComments();
?>
