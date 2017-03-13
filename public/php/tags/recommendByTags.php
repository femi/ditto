<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function recommends anyone who a user is not already friends with, and who has more than 2 interets in common.
 */
function recommendByTags() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

    $userId = $_SESSION['userId'];
    $threshold= 2;

    $query = "SELECT mu.fName, mu.lName, mu.username, mu.description, mu.common_interests FROM (SELECT u.userId, u.fName, u.lName, u.username, u.description, COUNT(*) AS common_interests FROM tag_users AS tu INNER JOIN users AS u ON u.userId = tu.userId WHERE tu.tagId IN (SELECT tu2.tagId FROM tag_users AS tu2 WHERE tu2.userId = $userId) AND tu.userId != $userId GROUP BY tu.userId HAVING common_interests >= $threshold) AS mu WHERE mu.userId NOT IN (SELECT fc.userId FROM friendcircle_users AS fcu INNER JOIN friendcircles AS fc ON fc.circleId = fcu.circleId WHERE fc.userId = $userId AND fc.name = 'everyone')";

    $potentialFriendsofFriendsQuery = "SELECT fcu1.userId FROM friendcircle_users AS fcu1 INNER JOIN friendcircles AS fc1 ON fcu1.circleId = fc1.circleId WHERE fc1.userId = $userId) UNION ( SELECT DISTINCT ff.userId FROM (SELECT fcu2.userId, fc2.userId AS ownerId FROM friendcircle_users AS fcu2 INNER JOIN friendcircles AS fc2 ON fcu2.circleId = fc2.circleId WHERE fc2.userId = $userId) AS f JOIN (SELECT fcu3.userId, fc3.userId AS ownerId FROM friendcircle_users AS fcu3 INNER JOIN friendcircles AS fc3 ON fcu3.circleId = fc3.circleId WHERE fc3.userId = $userId) AS ff ON ff.ownerId = f.userId WHERE f.ownerId = $userId)";

    echo $query;
    $result = db_query($query);

    if ($result === false) {
        mysqli_error(db_connect());
    }
    
    if (mysqli_num_rows($result) === 0) {
        echo "No one to recommend at the moment";
    } else {
        echo "People you might know:";
        while ($row = $result->fetch_assoc()) {
            $fName = $row['fName'];
            $lName = $row['lName'];
            $username = $row['username'];
            $description = $row['description'];
            
            echo "<div class=\"box\"><article class=\"media\"><div class=\"media-left\"> <figure class=\"image is-64x64\"><img src=\"\"></figure></div><div class=\"media-content\"><div class=\"content\">            <p><strong>$fName $lName</strong> <a href=\"/$username\"><small>@$username</small></a><br>$description</p></div></div></article></div>";

        } 
    }
}
recommendByTags();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/bulma.css"></link>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
    <?php require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php")?>  
  </body>
</html>

