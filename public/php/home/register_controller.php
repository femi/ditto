<?php

  require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');
  require (dirname(__FILE__) . '/../../../resources/db/db_query.php');

  /*
  * Inserts a new user into the database
  */
  function newUser() {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pNumber = $_POST['pNumber'];
    $dob = $_POST['dob'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // insert into db
    $query = "INSERT INTO `users` (`fName`, `lName`, `email`, `hashedPassword`, `mobileNumber`, `dob`) VALUES ('$fName', '$lName', '$email', '$password', '$pNumber', '$dob')";
    $result = db_query($query);

    if ($result === false) {
      echo "insert failure.";
    } else {
      echo "insert success.";
    }
  }

  /*
  * Checks to see if a user already exists
  */
  function checkUser($email) {

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_num_rows(db_query($query));

    if ($result ===  1) {
      return true;
    } else {
      return false;
    }
  }

  function register($email) {
    if (checkUser($email) === false) {
      newUser();
    } else {
      echo "email address already registered";
    }
  }

  if (isset($_POST['submit'])) {
  	register($_POST['email']);
}
?>
