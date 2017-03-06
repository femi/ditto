<?php
  include "$_SERVER[DOCUMENT_ROOT]/php/home/login.php";

  if( isset($_SESSION['userId']) ){
    header("location: /");
}
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
  </head>
  <body>
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container is-3">
          <div class="columns">
            <div class="box column is-4 is-offset-4">
              <h1 class="title is-1">Login</h1>
              <form action="" method="post">
                <p class="control">
                  <input class="input" type="text" name="email" placeholder="email" required><br>
                </p>
                <p class="control">
                  <input class="input" type="password" name="password" placeholder="password" required>
                </p>
                <p class="control">
                  <input class="button is-primary" type="submit" name="submit" value="Login">
                  <a href="/register" class="button">Register</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section>
</body>
</html>
