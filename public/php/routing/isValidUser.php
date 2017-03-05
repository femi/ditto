<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the given userId is in the User table.
     */
    function isValidUser($userId) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }

        $userId = db_quote($userId);

        $query = "SELECT * FROM users WHERE userId = $userId";
        $query_result = db_query($query);
        
        return (mysqli_num_rows($query_result) === 0) ? false : true;
    }

?>
