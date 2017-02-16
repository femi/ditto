<?php
  include("public/php/home/login.php");

  if( isset($_SESSION['login_user']) ){
    header("location: ./public/php/home/home.php");
}
?>

<html>
<body>

  <h1>Login</h1>

  <form action="" method="post">
    E-mail: <input type="text" name="email"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="submit">
  </form>

</body>
</html>
