<?php
  //session_start();

  // destroy the session
  if(session_destroy()) {
    header("Location: /"); // redirect to home page
  }

?>
