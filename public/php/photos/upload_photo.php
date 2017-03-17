<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");

function upload_photo() {
  
	$connection = db_connect();

	if ($connection === false) {
		// Handle error
	}

	$userId = $_SESSION['userId'];
	$albumId = db_quote($_POST['albumId']);

	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);

    // if (!userHasAlbum($userId, $albumId)) {
    //     return "403";
    // }

	$target_dir = "../../../resources/album_content/$userId/$albumId/";
    $filename = db_quote($_FILES["file"]["name"]);
    $filename = str_replace('/', '', $filename); // Ensure that there are no forward slashes in the filename, since this will muck up the routing.

    // check that the filename is unique
    $numRows = 1;
    while ($numRows > 0) {
        $query = "SELECT * FROM photos WHERE filename = $filename;";
        $query_result = db_query($query);

        if ($query_result === false) {
           mysqli_error(db_connect()); // should not happen - abort
           break;
        }

        if ($query_result->num_rows === 0) {
            // found a unique filename
            $numRows = 0;
        } else {
            // change the filename
             
            // get the extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = substr($filename, 0, strlen($filename) - strlen($extension) - 1); // remove the extension and .

            // count how many digits are at end of string.
            $matches = Array();
            preg_match('/(\d+)$/', $filename, $matches); // puts any succesful matches into array
            $numbers = $matches[0]; // [0] contains all matches
            if (strlen($numbers) === 0) {
                $filename = $filename . "1." . $extension; // no numbers, so just concat a one.
            } else {
                // increment nums and cast back to string
                $filenameWithoutNums = substr($filename, 0, strlen($filename) - strlen($numbers)); // remove the nums
                $numbers = (int) $numbers;
                $numbers = (string) $numbers + 1;
                $filename = $filenameWithoutNums . $numbers . "." . $extension; // concatenate
            }
        }
    }

    // $filename = basename($filename); 
    $filename = substr($filename, 1, strlen($filename) - 2); // remove the quotes;
	$target_file = $target_dir . $filename;

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$filename)) {
		// Execute the db query.
		// $filename = $_FILES['name'];
		$filename = db_quote($filename);
		$query = "INSERT INTO photos (albumId, filename) VALUES ($albumId, $filename)";	
		$qry_result = db_query($query);

		if ($qry_result === false) {
			echo mysqli_error(db_connect());
			return;
		} else {
			$status = 1;
		}
	}
}
upload_photo();
?>
