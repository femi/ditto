<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
$connection = db_connect(); // the db connection


function email_available($email) {
  $query = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = mysqli_num_rows(db_query($query));

  if ($result === 1) {
    return false;
  } else {
    return true;
  }
}

function username_available($username) {
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

function update_details($fName, $lName, $username, $city, $mobileNumber, $email, $description) {
  $userId = $_SESSION['userId'];
  $query = "UPDATE `users` SET `fName`='$fName', `lName`='$lName', `username`='$username', `email`='$email', `mobileNumber`='$mobileNumber', `city`='$city', `description`='$description' WHERE `userId` = $userId";
  $result = db_query($query);
}

function add_tag($userId, $tag) {
  $tag_id = intval(mysqli_fetch_assoc(db_query("SELECT * FROM `tags` WHERE `name` = '$tag'"))['tagId']);
  $query = "INSERT INTO `tag_users` (`tagId`, `userId`) VALUES ($tag_id, $userId)";
  return $result = db_query($query);
}

function delete_tag($userId, $tag) {
  $tag_id = intval(mysqli_fetch_assoc(db_query("SELECT * FROM `tags` WHERE `name` = '$tag'"))['tagId']);
  $query = "DELETE FROM tag_users WHERE tagId = $tag_id AND userId = $userId";
  return $result = db_query($query);
}

if( $_POST['updateDetails'] ) {
  update_details($_POST['fName'], $_POST['lName'], $_POST['username'], $_POST['city'], $_POST['mobileNumber'], $_POST['email'], $_POST['description']);
  header("Location: /settings");
}

else if( $_POST['changePassword'] ) {
  change_password($_SESSION['userId'], $_POST['oldPassword'], $_POST['newPassword']);
  header("Location: /settings");
}


if (isset($_REQUEST['username'])) {
  if (username_available($_REQUEST['username']) === true) {
    echo "true";
  } else {
    echo "false";
  }
}

if (isset($_REQUEST['email'])) {
  if (email_available($_REQUEST['email']) === true) {
    echo "false";
  } else {
    echo "true";
  }
}

if (isset($_REQUEST['tag'])) {
  if (add_tag($_SESSION['userId'], $_REQUEST['tag']) === true) {
    echo "success";
  } else {
    echo "failure";
  }
}

if (isset($_REQUEST['deltag'])) {
  if (delete_tag($_SESSION['userId'], $_REQUEST['deltag']) === true) {
    echo "deletion success";
  } else {
    echo "delition failure";
  }
}


?>
