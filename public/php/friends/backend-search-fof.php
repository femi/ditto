<?php

//include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php";
require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');
require (dirname(__FILE__) . '/../../../resources/db/db_query.php');
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/add-friend-button.php");


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connection = db_connect();


// session_start();

$userId = $_SESSION['userId'];

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$query = mysqli_real_escape_string($connection, $_POST['query']);

// search friends first name of last name like input
if(isset($query)){

    // select * from users
    // join friendcircle_users on users.userId = friendcircle_users.userId
    //     join friendcircles as fcouter on fcouter.circleId = fcuouter.circleId where name = 'everyone' and (fcuouter.userId != $userId) and fcouter.userId in (
    //         select fcu.userId from friendcircle_users as fcu
    //         join friendcircles as fc on fc.circleId = fcu.circleId where name='everyone' and fc.userId = $userId))


    $friendsoffriends = db_query(<<<HEREDOC

    select * from users where concat(users.fName, ' ', users.lName) like '%$query%' and users.userId not in (
        select fcu.userId from friendcircle_users as fcu
        join friendcircles as fc on fc.circleId = fcu.circleId where name='everyone' and fc.userId = $userId
    ) and users.userId in (
    select fcuouter.userId from friendcircle_users as fcuouter
    join friendcircles as fcouter on fcouter.circleId = fcuouter.circleId where name = 'everyone' and (fcuouter.userId != $userId) and fcouter.userId in (
        select fcu.userId from friendcircle_users as fcu
        join friendcircles as fc on fc.circleId = fcu.circleId where name='everyone' and fc.userId = $userId));


HEREDOC
);


                        if ($friendsoffriends) {
                            while($row =$friendsoffriends->fetch_assoc()){

                                $fName = $row['fName'];
                                $lName = $row['lName'];
                                $username = $row['username'];
                                $userId = $row['userId'];
                                $button = buttonSelector($userId);

                                $output = <<<HEREDOC

                                <article class="media">
                                  <figure class="media-left">
                                    <p class="image is-64x64">
                                      <img src="http://bulma.io/images/placeholders/128x128.png">
                                    </p>
                                  </figure>
                                  <div class="media-content">
                                    <div class="content">
                                      <p>
                                        <a href="/$username"><strong>$fName $lName</strong></a><br><small>Location</small><br>
                                        Biography goes here
                                      </p>
                                    </div>
                                  <div id="alltags">
                                  </div>
                                  </div>
                                  <div class="media-right">
                                    $button
                                  </div>
                                </article>

HEREDOC;

                                echo $output;
                            }
                        }


                            // if ($row['userId'] == $_SESSION['userId']){
                            //      //echo 'Logged in user: '.$_SESSION['userId'].' is a friend:'.$col['fName'].'->'.$row['fName'].'<br>';
                            //     //return 1;
                            // } else {
                            //     // uncomment the below line for debugging, see how friends of friends are connected
                            //     // echo 'Logged in user: '.$_SESSION['userId'].' is a friend of friend '.$row['fName'].' '.$row['lName'].' through '.$col['fName'].' '.$col['lName'].'<br>';
                            //
                            //     // print the user's name and link to their profile


        }

// close connection
mysqli_close($connection);
?>
<head>
<script type="text/javascript" src="/js/sendFriendRequest.js"></script>
</head>