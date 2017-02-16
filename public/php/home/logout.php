<?php
  session_start();

  // destroy the session
  if(session_destroy()) {
    header("Location: /hatebook/index.php"); // redirect to hompe page
  }

?>
