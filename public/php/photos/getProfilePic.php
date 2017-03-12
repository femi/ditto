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
function getProfilePic($userId) {
	$connection = db_connect(); // Try and connect to the database
    
    db_quote($userId);

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	$query = "SELECT filename, caption, photos.albumId FROM photos JOIN albums WHERE photos.albumId = albums.albumId AND albums.userId = $userId ORDER BY photos.createdAt DESC";
	$qry_result = db_query($query); 

	if ($qry_result === false) {
	    // No such album.
	 	echo mysqli_error(db_connect());
	}

    if (mysqli_num_rows($qry_result) === 0) {
        echo "<img src=\"/img/invalid.png\">";
    } else {
        while($row = $qry_result->fetch_assoc()){
            $caption = $row['caption'];
            $filename = $row['filename'];
            $albumId = $row['albumId'];
            $path= dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/album_content/$userId/$albumId/$filename";  
            // $path = preg_replace('#\s#', '\\ \\', $path); // get rid of whitespace issue
            echo $path;
            // echo "<img src='$path'>";
            echo "<img src='/img/invalid.png'>";
	    }
    }
}
?>
