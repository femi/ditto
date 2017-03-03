<?php
  //session_start();
?>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
  </head>

<!-- <nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item">
        <img src="http://placehold.it/100x30" alt="">
      </a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item is-tab">Login</a>
    </div>
  </div>
</nav> -->

  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
      <div class="columns">
        <div class="column is-4 is-offset-1">
            <h1 class="title is-1">Connect with your mates</h1>
            <h2 class="subtitle">
              Your favourite social network
            </h2>

            <figure class="image is-square">
              <img class="img-circle" src="http://i.giphy.com/26ufdipQqU2lhNA4g.gif">
            </figure>

        </div>

        <div class="column is-4 is-offset-1">
              <br>
              <form method="POST" action="register_controller.php" >
                <div class="control is-grouped">
                  <p class="control is-expanded">
                    <input class="input" type="text" name="fName" placeholder="First name" required>
                  </p>
                  <p class="control is-expanded">
                    <input class="input" type="text" name="lName" placeholder="Surname" required>
                  </p>
                </div>
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
                    or
                  <a href="/" class="button is-primary">Login</a>
                </p>
              </form>

        </div>
      </div>
    </div>
  </div>

  </section>

</html>
