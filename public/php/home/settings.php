<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

    <?php include ("header.php"); ?>
    <body>
      <div class="container">
      <br><br><h3 class="title is-3"><strong>Settings</strong></h3>
      <hr>
      </div>
      <div class="container">
        <div class="columns is-multiline">
          <div class="column is-one-quarter">

            <aside class="menu">
              <p class="menu-label">
                General
              </p>
              <ul class="menu-list">
                <li><a>Profile</a></li>
              </ul>
            </aside>

          </div>
            <div class="column content is-half">
              <h3 class="title-3">Personal Details 😁</h3>
              <p>Modify your personal information</p>
              <form action="/validate.php"  method="post">
                <div class="control is-horizontal">

                  <div class="control is-grouped">
                    <p class="control is-expanded">
                      <input class="input is-medium" type="text" name="fName" value="<?php echo $user_data['fName'];?>" placeholder="First name" required>
                    </p>
                    <p class="control is-expanded">
                      <input class="input is-medium" type="text" name="lName" value="<?php echo $user_data['lName'];?>" placeholder="Last name" required>
                    </p>
                  </div>
                </div>
                <p class="control">
                  <input class="input is-medium" type="text" name="city" value="<?php echo $user_data['city'];?>" placeholder="City" required>
                </p>
                <p class="control">
                  <input class="input is-medium" type="text" name="mobileNumber" value="<?php echo $user_data['mobileNumber'];?>" placeholder="Mobile Number" required>
                </p>
                <p class="control">
                  <input class="input is-medium" id="emailInput" name="email" type="email" value="<?php echo $user_data['email'];?>" placeholder="Email Address" required>
                </p>
                <p class="control">
                  <input class="input is-medium" id="usernameInput" name="username" type="text" value="<?php echo $user_data['username'];?>" placeholder="Username" required>
                </p>
                <input class="button is-primary is-medium" id="buttonSubmit" type="submit" name="updateDetails" value="Update Details"><hr>
              </form>

            <h3 class="title-3">Privacy 🕵️</h3>
            <p>Control who can see your profile.</p>
            <?php include "privacy.php" ?>

            <h3 class="title-3">Password 🔒</h3>
            <p>Change your password and make sure it's secure!</p>
            <form action="/validate.php" method="post">
              <p class="control">
                <input class="input is-medium" name="oldPassword" type="password" placeholder="Old Password" required>
              </p>
              <p class="control">
                <input class="input is-medium" name="newPassword" type="password" placeholder="New Password" required>
              </p>
              <input class="button is-primary is-medium" type="submit" name="changePassword" value="Change Password" onclick="alert('Password Changed');"><hr>
            </form>

            <h3 class="title-3">Deactivate your account 🤔</h3>
            <p>It's going to be sad to see you go.</p>
            <a class="button is-danger is-medium" onclick="alert('Ha, no!')">Deactivate</a>

          </div>

          <div class="column is-one-quarter">
            <figure class="image">
              <img class="img-rounded" src="https://s-media-cache-ak0.pinimg.com/736x/de/28/7a/de287a2e93bbe57ef5d1ec0e77c8c6a0.jpg">
            </figure>
            <br><a class="button is-outline is-medium">Change your photo</a>
          </div>
        </div>
      </div>

</body>

<script src="js/validation.js"></script>


<?php

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
  $query = "UPDATE `users` SET (`fName`, `lName`, `username`, `email`, `mobileNumber`, `city`) = ('$fName', '$lName', '$username', '$city', '$mobileNumber', '$email') WHERE `userId` = $userId";
  $result = db_query($query);
}

if (isset($_POST['changePassword']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) ) {
  change_password($_SESSION['userId'], $_POST['oldPassword'], $_POST['newPassword']);
  unset($_POST['changePassword']);
  unset($_POST['oldPassword']);
  unset($_POST['newPassword']);
  // header ("Location: /settings");
}

if (isset($_POST['updateDetails'])) {
  change_password($_SESSION['userId'], $_POST['oldPassword'], $_POST['newPassword']);
}

if ($_GET['action'] == 'pwd') {
  change_password($_SESSION['userId'], $_POST['oldPassword'], $_POST['newPassword']);
} else if ($_GET['action'] == 'details') {
  update_details($_POST['fName'], $_POST['lName'], $_POST['username'], $_POST['city'], $_POST['mobileNumber'], $_POST['email']);
}



 ?>
