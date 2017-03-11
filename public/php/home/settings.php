<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

<script src="js/jquery-3.1.1.min.js"></script>

  <body>
    <?php include ("header.php"); ?>
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
              <form action="/update_profile"  method="post">
                <div class="control is-horizontal">

                  <div class="control is-grouped">
                    <p class="control is-expanded">
                      <input class="input is-medium" type="text" value="<?php echo $user_data['fName'];?>" placeholder="First name" required>
                    </p>
                    <p class="control is-expanded">
                      <input class="input is-medium" type="text" value="<?php echo $user_data['lName'];?>" placeholder="Last name" required>
                    </p>
                  </div>
                </div>
                <p class="control">
                  <input class="input is-medium" type="text" placeholder="City" required>
                </p>
                <p class="control">
                  <input class="input is-medium" type="text" value="<?php echo $user_data['mobileNumber'];?>" placeholder="Mobile Number" required>
                </p>
                <p class="control">
                  <input class="input is-medium" id="emailInput" type="email" value="<?php echo $user_data['email'];?>" placeholder="Email Address" required>
                </p>
                <p class="control">
                  <input class="input is-medium" id="usernameInput" type="email" value="<?php echo $user_data['username'];?>" placeholder="Username" required>
                </p>
                <input class="button is-primary is-medium" type="submit" value="Update Details"><hr>
              </form>

            <h3 class="title-3">Privacy 🕵️</h3>
            <p>Control who can see your profile.</p>
            <?php include "privacy.php" ?>

            <h3 class="title-3">Password 🔒</h3>
            <p>Change your password and make sure it's secure!</p>
            <form action="" method="post">
              <p class="control">
                <input class="input is-medium" name="oldPassword" type="password" placeholder="Old Password">
              </p>
              <p class="control">
                <input class="input is-medium" name="newPassword1" type="password" placeholder="New Password">
              </p>
              <p class="control">
                <input class="input is-medium" name="newPassword2" type="password" placeholder="New Password">
              </p>
              <input class="button is-primary is-medium" type="submit" value="Change Password"><hr>
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
