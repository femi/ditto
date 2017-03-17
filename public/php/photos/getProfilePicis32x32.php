<?php
// For use with AJAX request.
// session_start();

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function queries the database to find the most recent photo in the users profile album.  If there are no results found, it returns a link
 * to a default profile picture image, else it returns a link to the profile picture.
 */
function getProfilePicis32x32($userId) {
	$connection = db_connect(); // Try and connect to the database
    
    db_quote($userId);

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	$query = "SELECT filename, caption, photos.albumId FROM photos INNER JOIN albums ON photos.albumId = albums.albumId AND albums.userId = $userId WHERE albums.albumName = 'Profile Pictures' ORDER BY photos.createdAt DESC LIMIT 1";
	$qry_result = db_query($query); 

	if ($qry_result === false) {
	    // No such album.
	 	echo mysqli_error(db_connect());
	}

    if (mysqli_num_rows($qry_result) === 0) {
        echo "<img class=\"img-rounded\" src=\"/img/defaultProfilePic.png\">";
    } else {
        while($row = $qry_result->fetch_assoc()){
            $caption = $row['caption'];
            $filename = $row['filename'];
            $albumId = $row['albumId'];
            $path= dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/album_content/$userId/$albumId/$filename";  
            // $path = preg_replace('#\s#', '\\ \\', $path); // get rid of whitespace issue
            // echo "<img src='$path'>";
            //echo "<img src='/img/invalid.png'>";
            // echo "<img src='$path'>";
            echo "<img class=\"image is-32x32\" src='/album_content/$userId/$albumId/$filename'>";
	    }
    }
}
?>
