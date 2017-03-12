<?php

  require_once(dirname(__FILE__) . '/../../../resources/db/db_connect.php');
  require_once(dirname(__FILE__) . '/../../../resources/db/db_query.php');
  require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/retrieve_albumId.php");

  // session_start();
  /*
   Inserts a new user into the database
  */
  function newUser() {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobileNumber = $_POST['mobileNumber'];
    $dob = $_POST['dob'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // insert into db
    $query = "INSERT INTO `users` (`fName`, `lName`, `email`, `username`, `hashedPassword`, `mobileNumber`, `dob`, `privacy`) VALUES ('$fName', '$lName', '$email', '$username', '$password', '$mobileNumber', '$dob', 0)";
    $result = db_query($query);

    if ($result === false) {
      // echo "insert failure.";
    } else {
      // echo "insert success.";
    }
  }

  /*
   Given an email address this function checks to see if a user already exists,
   if a user does exist it returns `true` otherwise the function returns false.
  */
  function checkUser($email) {

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_num_rows(db_query($query));

    if ($result === 1) {
      return true;
    } else {
      return false;
    }
  }

  /*
  This function registers a new user given an email address and returns
  a boolean true if an attempt to create a user was made and false otherwise.
  */
  function register($email) {
    if (checkUser($email) === false) {
      newUser();
      return true;
    } else {
      return false;
    }
  }

function getUserId($email) {
  $result = db_query("SELECT userId FROM `users` WHERE email = '$email'");
  return mysqli_fetch_assoc($result)['userId'];
}

function getUsername($email) {
    $result = db_query("SELECT username FROM users WHERE email = $email");
    return mysqli_fetch_assoc($result)['username'];
}

function createAlbum($userId) {
  // Probably could merge with the function in albums module at somepoint, but fine for now
  $query = "INSERT INTO `albums` (userId, albumName, isProfile) VALUES ('$userId', 'Profile Pictures', True)";
  $result = db_query($query);

  if ($result === false) {
    mysqli_error(db_connect());
  } else {
    // Create the relevant directory
      // Create user's album directory if it's not already there
      if (!file_exists("../resources/album_content/$userId")) {
        mkdir("../resources/album_content/$userId", 0775, true);
      }

      // need to retrieve the albumId and make a directory
      $newQuery = "SELECT * FROM albums WHERE userId = $userId ORDER BY createdAt DESC LIMIT 1";
      echo $newQuery;
      $newQueryResult = db_query($newQuery);

      if ($newQueryResult === false) {
        mysqli_error(db_connect());
      }

      while ($row = $newQueryResult->fetch_assoc()) { 
        //print_r($row);
        $albumId = $row['albumId'];
      }

      echo $albumId;

      if (!file_exists("../resources/album_content/$userId/$albumId")) {
        try {
            mkdir("../resources/album_content/$userId/$albumId", 0775, true);
        } catch (Exception $e) {
            echo "Album directory could not be created";
        }
      }
  }
}

function createFriendCircle($userId) {
  $query = "INSERT INTO `friendcircles` (userId, name) VALUES ('$userId', 'everyone')";
  $result = db_query($query);
}

// If the submit button has been pressed
if (isset($_POST['submit'])) {
  if (register($_POST['email'])) {

    // get the user's id number
    $userId = getUserId($_POST['email']);

    // set the session
    $_SESSION['userId'] = $userId;
    $_SESSION['username'] = $username;

    // initialise the user with album and friend circle
    createAlbum($userId);
    createFriendCircle($userId);

    // redirect to the homepage
    header("location: /");

  } else {
    echo "Email address already registered mate.";
  }
}
?>
