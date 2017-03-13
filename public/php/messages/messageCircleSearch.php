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

    if ($connection === false) {
        // something went wrong
    }

    $query = "SELECT circleId, name FROM friendcircles WHERE name LIKE '%$searchQuery%' AND userId = $userId LIMIT 3";
    
    $result = db_query($query);

    if ($result === false) {
        echo mysqli_error(db_connect());
    } else {
        if (mysqli_num_rows($result) === 0) {
            echo "No results found."; 
        } else {
            while ($row = $result->fetch_assoc()) {
                $circleId = $row['circleId'];
                $name= $row['name'];

                echo "<a onclick=\"addCircleMessageRecipient($circleId, '$name')\"><span class=\"tag is-info\">$name</span></a>";
            }
        }
    }
}
messageCircleSearch();
?>
