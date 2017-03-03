<?php
  //session_start();
?>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
  </head>


  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
      <div class="columns">
        <div class="column is-4 is-offset-1">
            <h1 class="title is-1">Connect with your mates</h1>
            <h2 class="subtitle">
              Your Favourite Social Network
            </h2>
        </div>

        <div class="column is-4 is-offset-1">
              <br>
              <form method="POST" action="register_controller.php" >
                <p class="control">
                  <input class="input" type="text" name="fName" placeholder="First name" required>
                </p>
                <p class="control">
                  <input class="input" type="text" name="lName" placeholder="Surname" required>
                </p>
                <p class="control">
                  <input class="input" type="text" name="email" placeholder="Email address" required>
                </p>
                <p class="control">
                  <input class="input" type="text" name="username" placeholder="Username" required>
                </p>
                <p class="control">
                  <input class="input" type="number" name="mobileNumber" placeholder="Mobile number" required>
                </p>
                <p class="control">
                  <input class="input" type="date" name="dob" placeholder="Birthday" required>
                </p>
                <p class="control">
                  <input class="input" type="password" name="password" placeholder="Password" required>
                </p>
                <p class="control">
                  <input class="button is-success" type="submit" name="submit" value="Create account">
                </p>
              </form>

        </div>
      </div>
    </div>
  </div>

  </section>

</html>
