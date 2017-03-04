<?php
  //session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/typed.js"></script>
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
            <h1 class="element title is-1" style="height: 2.3em;">Connect with <br> <span class="2"></span></h1>
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
                  <input class="button is-primary" type="submit" name="submit" value="Create account">
                    or
                  <a href="/" class="button">Login</a>
                </p>
              </form>

        </div>
      </div>
    </div>
  </div>

  </section>
  <script>
    $(function(){
        $("span.2").typed({
            strings: [" your friends 👫", " your love 😘", "your partners 💼", "the world 🌍"],
            showCursor: false,
            backDelay: 3000,
            typeSpeed: 50,
            backSpeed: 100,
            loop: true
        });
    });
    </script>
</html>
