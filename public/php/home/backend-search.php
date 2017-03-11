<?php

//include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php";
require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connection = db_connect();


session_start();

$userId = $_SESSION['userId'];

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$query = mysqli_real_escape_string($connection, $_POST['query']);

// search friends first name of last name like input
if(isset($query)){
    // Attempt select query execution
    //$sql = "SELECT * FROM users WHERE fName LIKE '" . $query . "%' or lName LIKE'" . $query . "%'";
    //select * from users where users.userId in (select userId from friendcircle_users where circleId = (select circleId from friendcircles where userId = 1));


    $sql = "select * from users as u
            inner join friendcircle_users as fcu on fcu.userId = u.userId
            inner join friendcircles as fc on fc.circleId = fcu.circleId
            where fc.userId = $userId and concat(fName, ' ', lName) like '%".$query."%'";


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
