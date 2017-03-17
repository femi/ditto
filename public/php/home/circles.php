
<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-R.php");

 ?>


 <h5 class="title is-5">
 <span class="icon">
   <i class="fa fa-circle-o" aria-hidden="true"></i>
 </span>
   <strong>Circles</strong>
 </h5>
 <div class="level">
<?php

  $result = retrieve_friend_circles($userId);

  if ($result) {
    if (mysqli_num_rows($result) > 0 ) {
      $counter = 0;
      while($row = $result->fetch_assoc() and $counter < 3) {
        $name = strtoupper(substr($row['name'], 0, 1));
        $id = $row['circleId'];
        echo
        "<div class=\"level-item image is-64x64\">
          <a class=\"circle button is-primary\" href=\"/$username/circles/$id\"><strong><h1 class=\"title is-5\">$name</h1></strong></a>
        </div>
        ";
        $counter++;
    }
  } else {
      echo "<div class=\"content\">You dont seem to have any circles at the moment, you can create some <a href=\"$username/circles\">here.</a></div>";
    }
  }



  // $counter = 0;
 ?>
</div>
