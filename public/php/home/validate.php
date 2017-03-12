<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
$connection = db_connect(); // the db connection


function validate_email($email) {
  $query = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = mysqli_num_rows(db_query($query));

  if ($result === 1) {
    return false;
  } else {
    return true;
  }
}

function validate_username($username) {
  $query = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = mysqli_num_rows(db_query($query));

  if ($result === 1) {
    return false;
  } else {
    return true;
  }
}

function change_password($userId, $old_password, $new_password) {
  $userId = $_SESSION['userId'];
  $query = "SELECT `hashedPassword` FROM `users` WHERE `userId` = $userId";
  $result = db_query($query);

  $hashed_password = mysqli_fetch_assoc($result)['hashedPassword'];

  if (password_verify($old_password, $hashed_password)) {
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $query = "UPDATE `users` SET `hashedPassword` = '$new_password_hash' WHERE `userId` = $userId";
    $result = db_query($query);
  } else {
    echo "Invalid Password Given";
  }
}

function update_details($fName, $lName, $username, $city, $mobileNumber, $email) {
  $userId = $_SESSION['userId'];
  $query = "UPDATE `users` SET `fName`='$fName', `lName`='$lName', `username`='$username', `email`='$email', `mobileNumber`='$mobileNumber', `city`='$city' WHERE `userId` = $userId";
  $result = db_query($query);
}

if( $_POST['updateDetails'] ) {
  update_details($_POST['fName'], $_POST['lName'], $_POST['username'], $_POST['city'], $_POST['mobileNumber'], $_POST['email']);
  header("Location: /settings");
}
else if( $_POST['changePassword'] ) {
  change_password($_SESSION['userId'], $_POST['oldPassword'], $_POST['newPassword']);
  header("Location: /settings");
}


if (isset($_REQUEST['username'])) {
  if (validate_username($_REQUEST['username']) === true) {
    echo "false";
  } else {
    echo "true";
  }
}

if (isset($_REQUEST['email'])) {
  if (validate_email($_REQUEST['email']) === true) {
    echo "false";
  } else {
    echo "true";
  }
}
 ?>
