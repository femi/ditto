<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
  </head>
  <body>
    <div id="ajaxResult">
<?php
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");


/**
 * @param $albumId: The albumId from which to get the photos
 * @param $username: Passed on to the photo getters to create appropriate links
 * This function gets all the photos from inside the given album.
 */
function non_ajax_get_album_photos_nonowner($albumId, $username) {

	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from request and escape.
	// $userId = db_quote($_REQUEST['userId']); // userId for person trying to view data.

	// TODO check that userId is allowed to view the album

	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE albumId = $albumId";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
	}

	// $albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	$first = true;
    echo "<div class=\"container\">";
    
	while($row = $qry_result->fetch_assoc()){
		// scan the directory given
		if ($first === true) {
			$albumName = $row['albumName'];
            echo "<br>";
            echo "<div class=\"level\"><div class=\"level-left\"><h2 class=\"title is-2 level-item\">$albumName</h2></div><div class=\"level-right\"><a class=\"button is-primary is-outlined\" href=\"../albums\">Back to albums</a></div></div><hr>";
			$first = false;
		}	
		$userId = $row['userId'];
        $dir = "../resources/album_content/$userId/$albumId"; 
        $photo_files = scandir($dir);
	}

	$photo_files = array_diff($photo_files, array('.', '..')); // remove . and .. directories

    echo "<div id=\"albumPhotos\" class=\"columns is-multiline\">";
	foreach($photo_files as $photoName) {
		$file = "../../album_content/$userId/$albumId/$photoName";
        echo "<div class=\"column is-4\"><div class=\"card\"><div class=\"card-image\"><figure class=\"image is-2by1\"><a href=\"../../../../$username/albums/$albumId/$photoName\"><img src=\"$file\" alt=\"Test\"></a></figure></div></div></div>"; // TODO get captions$}
    }

    echo "</div>"; // end columns div
    echo "</div>"; // end container div
}
?>
</div>
  </body>
</html>
