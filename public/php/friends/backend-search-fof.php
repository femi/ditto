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

// search friends first name of last name like input
if(isset($query)){

    // get the logged in user's friends
        $friends = db_query("SELECT userId FROM users WHERE userId IN (
            SELECT userId FROM friendcircle_users WHERE circleId=(
                SELECT circleId from friendCircles WHERE name='everyone' AND userId=$userId))");


        while($col = $friends->fetch_assoc()){
                    //gets friend of friends
                    $friendsoffriends = db_query("SELECT userId FROM users WHERE userId IN (
                        SELECT userId FROM friendcircle_users WHERE circleId=(
                            SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$col['userId']."))");

                        while($row =$friendsoffriends->fetch_assoc()){


                            if ($row['userId'] == $_SESSION['userId']){
                                 echo 'Yes, logged in user: '.$_SESSION['userId'].' is friend of friend:'.$col['userId'].'->'.$row['userId'].'<br>';
                                 echo 'Returned: ';
                                return 1;
                            } else {
                                echo 'No, logged in user: '.$_SESSION['userId'].' is NOT a friend of friend '.$col['userId'].'->'.$row['userId'].'<br>';
                                //Do nothing
                            }
                        }

        }

    // Attempt select query execution


    // if($result = mysqli_query($connection, $sql)){
    //     if(mysqli_num_rows($result) > 0){
    //         while($row = mysqli_fetch_array($result)){
    //             // TODO: INSERT CORRECT URL FOR USER'S PROFILE
    //             echo "<a href=".$row['username']."><p>" . $row['fName'] . " ". $row['lName'] ."</p></a>";
    //         }
    //         // Close result set
    //         mysqli_free_result($result);
    //     } else{
    //         echo "<p>No friends found for <b>$query</b></p>";
    //     }
    // } else{
    //     echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
    // }
}

// close connection
mysqli_close($connection);
?>
