<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>

    <?php include ("header.php"); ?>
    <body>
      <div class="container">
      <br><h2 class="title is-2">Settings</h2>
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
                  <textarea class="textarea is-medium" type="text" name="description" placeholder="Biography"><?php echo $user_data['description'];?></textarea>
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

            <h3 class="title-3">Interests 🖌</h3>
            <p>Show your uniqueness.</p>

              <div id="alltags" class="content">
              <?php
              while ( $row = $usertags->fetch_assoc()){
                $name = $row['name'];
                // echo $name;
                echo ("<span id=\"tag_$name\" class=\"tag is-info is-medium\">$name<button class=\"delete is-small\" onclick=\"removeInterest('tag_$name')\" ></button></span>");
              }
              ?>
              </div>

              <p class="control">
                <span class="select is-medium">
                  <select id="myselect">
                    <option value="Interests" disabled selected style="display: none;">Interests</option>

                    <?php
                      while ( $row = $alltags->fetch_assoc()){
                        $tag = $row['name'];
                        echo ("<option value=\"$tag\">$tag</option>");
                      }
                     ?>
                  </select>
                </span>
              </p><hr>

              <!-- <input class="button is-primary is-medium" id="buttonSubmit2" type="submit" name="updateInterests" value="Update Interests"><hr> -->

            <h3 class="title-3">Deactivate your account 🤔</h3>
            <p>It's going to be sad to see you go.</p>
            <a class="button is-danger is-medium" onclick="alert('Ha, no!')">Deactivate</a>

          </div>
          <div class="column is-one-quarter"></div>
        </div>
      </div>

</body>

<script src="js/validation.js"></script>
