<?php

// session_start();
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Create new friend circle for a given logged in user
function insert_circle($circleName) {

    $result = db_query("INSERT INTO friendcircles (userId, name) VALUES (".$_SESSION['userId'].", ".db_quote($circleName).")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
    }

}

if (strlen($_POST['circleName'])>0 && $_POST['circleName'] != "everyone"){
	insert_circle($_POST['circleName']);
  $username = $_SESSION['username'];
  header ("Location: /$username/circles");
} else {
	echo "Please enter a valid circle name. <br>'everyone' is a reserved name.";
}



?>

<!-- <form action="../circles" method="post">
    <input type="submit" value="Back to CRUD">
</form> -->
