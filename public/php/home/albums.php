<?php
require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/getAlbumThumbnails.php");
$photos = getAlbumThumbnails($userId); // an array of photo thumbnails, maximum of length 3, minimum 0
?>

<h5 class="title is-5">
  <span class="icon">
    <i class="fa fa-picture-o" aria-hidden="true"></i>
  </span>
  <strong>Albums</strong>
</h5>
<div class="level">

<?php

if (count($photos) !== 0 ) {
  foreach ($photos as $photo) {
    echo
    "
    <div class=\"level-item\">
      <figure class=\"image is-64x64\">
        <div class=\"is-info\">$photo</div>
      </figure>
    </div>
    ";
  }
} else {
  if ($userId != $_SESSION['userId']){
    echo "<div class=\"content\" align=\"center\">This user doesn't currently have any albums :( <br> Check back later!</div>";
  } else {
  echo "<div class=\"content\">You dont seem to have any photos at the moment, you can create some <a href=\"$username/albums\">here.</a></div>";
  }

}
?>
</div>
