<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the given username is in the User table.
     */
    function isValidUsername($username) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }
        
        $username = db_quote($username);
        $username = substr($username, 1, strlen($username) - 2);

        $query = "SELECT * FROM users WHERE username = '$username'";
        $query_result = db_query($query);
        
        return (mysqli_num_rows($query_result) === 0) ? false : true;
    }

?>
