<?php
  include "$_SERVER[DOCUMENT_ROOT]/php/home/login.php";

  if( isset($_SESSION['userId']) ){
    header("location: /");
}
?>

<html>
<body>

  <h1>Login</h1>

  <form action="" method="post">
    <input type="text" name="email" placeholder="email" required><br>
    <input type="password" name="password" placeholder="password" required><br><br>
    <input type="submit" name="submit" value="Login">
  </form>

  <form action="/register">
    <input type="submit" value="Register" />
  </form>

</body>
</html>
