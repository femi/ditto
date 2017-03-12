<?php

session_start();

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect();

function update_privacy($privacy, $userId) {
    $query = "UPDATE users SET privacy = $privacy WHERE userId=$userId";
    $result = db_query($query);
  }

// update the privacy of the logged in user
update_privacy($_POST['privacy'], $_SESSION['userId']);

?>
