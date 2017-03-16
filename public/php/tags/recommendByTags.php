<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function recommends anyone who a user is not already friends with, and who has more than 2 interets in common.
 */
function recommendByTags($userId, $threshold) {
    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }
    
    $query = "SELECT mInterests.userId, mInterests.fName, mInterests.lName, mInterests.city, mInterests.description, mInterests.common_interests, COUNT(*) AS mutual FROM (SELECT u.userId, u.city, u.fName, u.lName, u.username, u.description, COUNT(*) AS common_interests FROM tag_users AS tu INNER JOIN users AS u ON u.userId = tu.userId WHERE tu.tagId IN (SELECT tu2.tagId FROM tag_users AS tu2 WHERE tu2.userId = $userId) AND tu.userId != $userId GROUP BY tu.userId HAVING common_interests >= $threshold) AS mInterests INNER JOIN friendcircles AS fc1 ON fc1.userId = mInterests.userId AND fc1.name = 'everyone' INNER JOIN friendcircle_users AS fcu1 ON fc1.circleId = fcu1.circleId INNER JOIN users AS u2 ON fcu1.userId = u2.userId  WHERE mInterests.userId NOT IN (SELECT fcu.userId FROM friendcircle_users AS fcu INNER JOIN friendcircles AS fc ON fc.circleId = fcu.circleId WHERE fc.userId = $userId AND fc.name = 'everyone') AND fcu1.userId IN (SELECT u4.userId FROM friendcircles AS fc3 INNER JOIN friendcircle_users AS fcu3 ON fc3.circleId = fcu3.circleId INNER JOIN users AS u4 ON u4.userId = fcu3.userId WHERE fc3.userId = $userId AND fc3.name = 'everyone') AND u2.userId != $userId GROUP BY mInterests.userId ORDER BY mutual DESC, mInterests.common_interests DESC";
    
    $fallbackQuery = "SELECT mu.fName, mu.lName, mu.userId, mu.username, mu.city, mu.description, mu.common_interests FROM (SELECT u.userId, u.city, u.fName, u.lName, u.username, u.description, COUNT(*) AS common_interests FROM tag_users AS tu INNER JOIN users AS u ON u.userId = tu.userId WHERE tu.tagId IN (SELECT tu2.tagId FROM tag_users AS tu2 WHERE tu2.userId = $userId) AND tu.userId != $userId GROUP BY tu.userId HAVING common_interests >= $threshold) AS mu WHERE mu.userId NOT IN (SELECT fc.userId FROM friendcircle_users AS fcu INNER JOIN friendcircles AS fc ON fc.circleId = fcu.circleId WHERE fc.userId = $userId AND fc.name = 'everyone')";


    $result = db_query($query);

    if ($result === false) {
        echo $query;
        mysqli_error(db_connect());
    }

    if (mysqli_num_rows($result) === 0) {
        $result = db_query($fallbackQuery);
        if (mysqli_num_rows($result) === 0) {
            echo "No one to recommend at the moment";
        } else {
            echo "<div class=\"container\">";
            echo "<br><h2 class=\"title is-2\">People you might know:</h2><hr>";
            while ($row = $result->fetch_assoc()) {
                $fName = $row['fName'];
                $lName = $row['lName'];
                $username = $row['username'];
                $description = $row['description'];
                $friendId = $row['userId'];
            
                require_once("$_SERVER[DOCUMENT_ROOT]/php/tags/viewTagUsers.php");

                echo "<div class=\"container\">";
                displaySearchResult($row);
                echo "<hr>";
                echo "</div>";
            }

        }
    } else {
        echo "<div class=\"container\">";
        echo "<br><h2 class=\"title is-2\">People you might know:</h2><hr>";
        while ($row = $result->fetch_assoc()) {
            $fName = $row['fName'];
            $lName = $row['lName'];
            $username = $row['username'];
            $description = $row['description'];
            $friendId = $row['userId'];

            // echo "<div class=\"box\"><article class=\"media\"><div class=\"media-left\"> <figure class=\"image is-64x64\"><img src=\"\"></figure></div><div class=\"media-content\"><div class=\"content\">            <p><strong>$fName $lName</strong> <a href=\"/$username\"><small>@$username</small></a><br>$description</p></div></div></article></div>";

            require_once("$_SERVER[DOCUMENT_ROOT]/php/tags/viewTagUsers.php");


            if (isUserUsersFriend($friendId)){

            } else{
                echo "<div class=\"container\">";
                displaySearchResult($row);
                echo "<hr>";
                echo "</div>";

            }



        }

    }
}
?>
