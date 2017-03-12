<?php

require_once(dirname(__FILE__) . '/../../../resources/db/db_connect.php');
require_once(dirname(__FILE__) . '/../../../resources/db/db_query.php');

// session_start();
$error='';

if ( isset($_POST['submit']) ) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo 'email address or password is invalid';
  } else {

    $email = cleanInput($_POST['email']);
    $password = cleanInput($_POST['password']);
    $connection = db_connect();
    $query = db_query("SELECT * FROM `users` WHERE email = '$email' AND hashedPassword = '$password' ");

    // check to see if user exists
    $userValid = mysqli_num_rows(db_query("SELECT * FROM `users` WHERE email = '$email'"));

    if ($userValid === 1) {
      $userHash = db_query("SELECT `hashedPassword` FROM `users` WHERE `email` = '$email'");
      $row = mysqli_fetch_assoc($userHash)['hashedPassword'];

      if (password_verify($password, $row) === true) {

        $_SESSION['userId'] = getUserId($email);   // Initializing Session

        // fallback to this if merge doesn't work
        //$_SESSION['username'] = getUsername($email);   // Initializing Session

        // header("location: /");

        $_SESSION['username'] = getUserName($email);   // Initializing Session
        header("location: /albums");
      }

    } else {
      $error = "Email address or Password is invalid";
    }
    mysqli_close($connection); // Closing Connection
  }
}

/*
A collection of functions to clean the input data.
*/
function cleanInput($input) {
  $input = stripslashes($input);
  // will add more
  return $input;
}

function getUserId($email) {
  $result = db_query("SELECT userId FROM `users` WHERE `email` = '$email'");
  return mysqli_fetch_assoc($result)['userId'];
}

// previous version, fallback if merge doesn't work
// function getUsername($email) {
//     $query = "SELECT username FROM users WHERE email = '$email'";
//     $result = db_query($query);
//     $username = mysqli_fetch_assoc($result)['username'];
//     return $username;

function getUserName($email) {
    $result = db_query("SELECT username FROM users WHERE email = '$email'");
    return mysqli_fetch_assoc($result)['username'];
}

?>
