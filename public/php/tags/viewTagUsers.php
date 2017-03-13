<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function viewTagUsers($tagname) {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

    $tagname = db_quote($tagname);
    $userId = $_SESSION['userId'];

    $query = "SELECT fName, lName, username FROM users JOIN tag_users WHERE users.userId = tag_users.userId AND users.userId != $userId";
    $result = db_query($query);

    if ($result === false) {
        mysqli_error(db_connect());
    }
    
    if (mysqli_num_rows($result) === 0) {
        echo "There are currently no users interested in this...lol.";
    } else {
        while ($row = $result->fetch_assoc()) {
            $fName = $row['fName'];
            $lName = $row['lName'];
            $username = $row['username'];
            $description = $row['description'];

            echo "<div class=\"box\"><article class=\"media\"><div class=\"media-left\"> <figure class=\"image is-64x64\"><img src=\"\"></figure></div><div class=\"media-content\"><div class=\"content\">            <p><strong>$fName $lName</strong> <a href=\"/$username\"><small>@$username</small></a><br>$description</p></div></div></article></div>";
        } 
    }
}

?>
