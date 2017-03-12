<?php
//session_start();
require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');
require (dirname(__FILE__) . '/../../../resources/db/db_query.php');

$userId = $_SESSION['userId'];
// Fetch all user data
$user_data = db_query("SELECT * FROM `users` WHERE `userId` = '$userId'");
$user_data = $user_data -> fetch_assoc();
$username = $user_data['username'];
$fullname = $user_data['fName'] . " " . $user_data['lName'];
$firstname = $user_data['fName'];

if (!isset($login_session)) {
  // mysqli_close($connection); // Closing Connection
  // header('Location: index.php'); // Redirecting To Home Page
}
?>
