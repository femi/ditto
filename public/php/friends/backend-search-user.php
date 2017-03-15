<?php

//include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php";
require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');
require (dirname(__FILE__) . '/../../../resources/db/db_query.php');


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


if(isset($query)){

    // get the logged in user's friends
        $users = db_query("SELECT * FROM users WHERE CONCAT(fName, ' ', lName) LIKE '%$query%'");

        while($row = $users->fetch_assoc()){

            echo '<a href=/'.$row['username'].'>'.$row['fName'].' '.$row['lName'].'<br></a>';

        }

}

// close connection
mysqli_close($connection);
?>
