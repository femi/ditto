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
