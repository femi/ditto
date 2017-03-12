<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function submitPhotoComment() {
    // Get data from requests and escape it.
    $userId = $_SESSION['userId'];
    $albumId = $_REQUEST['albumId'];
    $photoName = $_REQUEST['filename'];
    $message = $_REQUEST['message'];

    $userId = db_quote($userId);
    $albumId = db_quote($albumId);
    $photoName = db_quote($photoName);
    $message= db_quote($message);

    $userId = (int) substr($userId, 1, strlen($userId) - 2); 
    $albumId= substr($albumId, 1, strlen($albumId) - 2);
    $photoName = substr($photoName, 1, strlen($photoName) - 2);
    $message = substr($message, 1, strlen($message) - 2);
        
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

	    // build query
        
	    $query = "INSERT INTO comments (userId, photoId, message) VALUES ($userId, $photoId, '$message')";
	    $qry_result = db_query($query);

	    if ($qry_result === false) {
	        echo mysqli_error(db_connect());
	        return;
	    } else {
            return;
        }

    }
    
}
submitPhotoComment();
?>
