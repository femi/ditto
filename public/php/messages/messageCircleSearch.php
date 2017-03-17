<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function messageCircleSearch() {

    $searchQuery = $_REQUEST['name'];
    $userId = $_SESSION['userId'];

    db_quote($searchQuery);

    $connection = db_connect();

    // vars to test what to display
    $hasCircles = false;
    $inOthersCircles = false;

    if ($connection === false) {
        // something went wrong
    }

    // search is empty, no results
    if ($searchQuery == "") {
        return;
    }

    // get circles that a user belongs in that are owned by other users
    $query = "SELECT circleId, name from friendcircles where circleId in(
            SELECT circleId FROM friendcircle_users WHERE (userId = $userId) AND (name != 'everyone') AND (name LIKE '%$searchQuery%')) LIMIT 3";


    $result = db_query($query);

    if ($result === false) {
        echo mysqli_error(db_connect());
    } else {
        if (mysqli_num_rows($result) === 0) {
            // user not in others circles
        } else {
            $inOthersCircles = true;
            while ($row = $result->fetch_assoc()) {
                $circleId = $row['circleId'];
                $name= $row['name'];

                echo "<a onclick=\"addCircleMessageRecipient($circleId, '$name')\"><span class=\"tag is-info\">$name</span></a>";
            }
        }
    }

    // get circles that a user owns
    $query = "SELECT circleId, name FROM friendcircles WHERE (name != 'everyone') AND (name LIKE '%$searchQuery%') AND userId = $userId LIMIT 3";

    $result = db_query($query);

    if ($result === false) {
        echo mysqli_error(db_connect());
    } else {
        if (mysqli_num_rows($result) === 0) {
            // user has no circles
        } else {
            $hasCircles = true;
            while ($row = $result->fetch_assoc()) {
                $circleId = $row['circleId'];
                $name= $row['name'];

                echo "<a onclick=\"addCircleMessageRecipient($circleId, '$name')\"><span class=\"tag is-info\">$name</span></a>";
            }
        }
    }

    if (!$hasCircles & !$inOthersCircles) {
        echo 'No results found.';
    }
}
messageCircleSearch();
?>
