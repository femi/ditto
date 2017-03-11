<?php

//include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php";
require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connection = db_connect();

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$query = mysqli_real_escape_string($connection, $_POST['query']);

// search friends first name of last name like input
if(isset($query)){
    // Attempt select query execution
    $sql = "SELECT * FROM users WHERE fName LIKE '" . $query . "%' or lName LIKE'" . $query . "%'";


    if($result = mysqli_query($connection, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                // TODO: INSERT CORRECT URL FOR USER'S PROFILE
                echo "<a href=".$row['username']."><p>" . $row['fName'] . " ". $row['lName'] ."</p></a>";
                //echo "<p>" . $row['fName'] . " ". $row['lName'] ." ".$row['userId']."</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query</b></p>";
        }
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
    }
}

// close connection
mysqli_close($connection);
?>
