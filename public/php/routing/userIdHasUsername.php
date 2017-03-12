<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the username for the given userId matches the given username.
     */
    function userIdHasUsername($userId, $username) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }

        $userId = db_quote($userId);

        $query = "SELECT * FROM users WHERE userId = $userId";
        $query_result = db_query($query);

        if ($query_result === false) {
            mysqli_error(db_connect());
        }

        if (mysqli_num_rows($query_result) === 0) {
            // userId not found.
            throw new RouteException('userId not found'); 
        }

        while($row = $query_result->fetch_assoc()) {
            if ($row['username'] === $username) {
                return true;
            } else {
                return false;
            }
        }
    }

?>
