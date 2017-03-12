<?php

//session_start();
require_once(dirname(__FILE__) . '/../../../resources/db/db_connect.php');
require_once(dirname(__FILE__) . '/../../../resources/db/db_query.php');


$userId = $_SESSION['userId'];
// Fetch all user data
$user_data = db_query("SELECT * FROM `users` WHERE `userId` = '$userId'");
$user_data = $user_data -> fetch_assoc();
$username = $user_data['username'];

//Leave this here!  DO NOT REMOVE pls. Thanks.
$_SESSION['username'] = $user_data['username'];


$fullname = $user_data['fName'] . " " . $user_data['lName'];
$firstname = $user_data['fName'];

// Tags 
$alltags = db_query("SELECT * FROM tags");
$usertags = db_query("SELECT * FROM tags INNER JOIN tag_users ON tags.tagId = tag_users.tagId WHERE userId = '$userId'");


if (!isset($login_session)) {
  // mysqli_close($connection); // Closing Connection
  // header('Location: index.php'); // Redirecting To Home Page
}s
?>
