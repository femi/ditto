<?php
function privacy_level($id) {
  switch ($id) {
    case 0:
      return "Everyone";
    case 1:
      return "Friends";
    case 2:
      return "Friends of friends";
    case 3:
      return "No one";
  }
}
?>

<h3 class="title is-5"><strong>Privacy</strong> </h3>
  <span class="select is-medium">
    <select id="privacy" onchange="updatePrivacy()">
      <option value="" disabled selected style="display: none;"><?php echo privacy_level($user_data['privacy']) ?></option>
      <option value="0">Everyone</option>
      <option value="1">Friends</option>
      <option value="2">Friends of friends</option>
      <option value="3">No one</option>
    </select>
  </span>
  <hr>
