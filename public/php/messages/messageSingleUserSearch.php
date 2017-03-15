<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function messageSingleUserSearch() {

    $searchQuery = $_REQUEST['name'];
    $userId = $_SESSION['userId'];

    db_quote($searchQuery);

    $connection = db_connect();

    if ($connection === false) {
        // something went wrong
    }

    // search is empty, no results
    if ($searchQuery == "") {
        return;
    }

    $query = "SELECT fName, lName, userId FROM users WHERE (fName LIKE '%$searchQuery%' OR lName LIKE '%$searchQuery%') AND userId IN (SELECT userId FROM friendcircle_users WHERE circleId IN (SELECT circleId FROM friendcircles WHERE userId = $userId))";

    $result = db_query($query);

    if ($result === false) {
        echo mysqli_error(db_connect());
    } else {
        if (mysqli_num_rows($result) === 0) {
            echo "No results found.";
        } else {
            while ($row = $result->fetch_assoc()) {
                $fName = $row['fName'];
                $lName = $row['lName'];
                $userId = $row['userId'];

                echo "<a onclick=\"addMessageRecipient($userId, '$fName', '$lName')\"><span class=\"tag is-info\">$fName $lName</span></a>";
            }
        }
    }
}
messageSingleUserSearch();
?>
