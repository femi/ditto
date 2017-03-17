<?php
  //session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/typed.js"></script>
  </head>

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
                    <input class="input is-medium" type="text" name="fName" placeholder="First name" required>
                  </p>
                  <p class="control is-expanded">
                    <input class="input is-medium" type="text" name="lName" placeholder="Surname" required>
                  </p>
                </div>
                <p class="control">
                  <input id="emailInput" class="input is-medium" type="text" name="email" placeholder="Email address" required>
                </p>
                  <p class="control" id="emailLabel"></p>
                <p class="control">
                  <input id="usernameInput" class="input is-medium" type="text" name="username" placeholder="Username" required>
                </p>
                  <p class="control" id="usernameLabel"></p>
                <p class="control">
                  <input class="input is-medium" type="number" name="mobileNumber" placeholder="Mobile number" required>
                </p>
                <p class="control">
                  <input class="input is-medium" type="date" name="dob" placeholder="Birthday" required>
                </p>
                <p class="control">
                  <input class="input is-medium" type="password" name="password" placeholder="Password" required>
                </p>
                <p class="control">
                  <input id="buttonSubmit" class="button is-primary is-medium" type="submit" name="submit" value="Create account">
                    or
                  <a href="/" class="button is-medium">Login</a>
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
    <script src="js/validation.js"></script>
</html>
