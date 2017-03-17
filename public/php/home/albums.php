<?php 
require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/getAlbumThumbnails.php");
$photos = getAlbumThumbnails($_SESSION['userId']); // an array of photo thumbnails, maximum of length 3, minimum 0
?>
<h5 class="title is-5">
  <span class="icon">
    <i class="fa fa-picture-o" aria-hidden="true"></i>
  </span>
  <strong>Albums</strong>
</h5><div class="level">
  <div class="level-item">
  <figure class="image is-64x64">
    <div class="circle button is-outlined is-info"><a href="/<?php echo $username ?>/circles">A</a></div>
  </figure>
</div>
<div class="level-item">
  <figure class="image is-64x64">
    <div class="circle button is-outlined is-info"><a href="/<?php echo $username ?>/circles">B</a></div>
  </figure>
</div>
<div class="level-item">
  <figure class="image is-64x64">
  <div class="circle button is-outlined is-info"><?php echo $photos[0] ?></div>
  </figure>
</div>
</div>
