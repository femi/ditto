<?php
    require_once(__DIR__.'/get-all-users.php');
    require_once(__DIR__.'/friend-circles-R.php');
    require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
?>

<div class="container">
  <br><h2 class="title is-2">Circles</h2><hr>
    <div class="columns">
      <div class="column is-one-quarter">
        <h4 class="title is-4"><strong>New</strong></h4>
        <div class="content">
          Use this area create new circles for the people you want to connect with.
        </div>
        <form action="circles/addCircle" method="post">
          <p class="control">
            <input class="input" type="text" placeholder="Enter a circle name e.g. Colleagues" name="circleName"></input>
          </p>
          <p class="control">
            <input class="button is-primary" type="submit" value="Create">
          </p>
        </form>
        <hr>
      </div>
      <div class="column is-1"></div>
      <div class="column">
        <h4 class="title is-4"><strong>Your Circles</strong></h4>
        <?php displayAllCircles($_SESSION['userId']); ?>
      </div>
    </div>
</div>

<?php
  /* Displays a circle when given a mysqli result */
  function displayCircle($circle) {

    $circle_id = $circle['circleId'];
    $circle_name = $circle['name'];
    $letter = substr($circle_name, 0, 1);
    $username = $_SESSION['username'];

    $circle_html = "
            <article id=\"ci_$circle_id\" class=\"media\">
              <figure class=\"media-left\">
                <a class=\"circle button is-primary\" href=\"/$username/circles/$circle_id\"><strong><h1 class=\"title is-5\">$letter</h1></strong></a>
              </figure>
              <div class=\"media-content\">
                <div class=\"content\">
                  <p>
                    <a href=\"/$username/circles/$circle_id\"><strong>$circle_name</strong></a><br>
                  </p>
                </div>
              <div id=\"alltags\">
              </div>
              </div>
              <div class=\"media-right\">
                <button class=\"delete\" onclick=\"deleteCircle($circle_id)\"></button>
              </div>
            </article>";
            if($circle_name != "everyone"){
    return $circle_html;
  }
  }

  function displayAllCircles($userId) {
    $all_circles = retrieve_friend_circles($userId);
    $all_circles_html = "";
    if(mysqli_num_rows($all_circles) === 1){
      echo "You currently have no friend circles :( <br>";
    }
    while($circle = $all_circles->fetch_assoc()){

      $all_circles_html = $all_circles_html . displayCircle($circle);
    }
    echo $all_circles_html;
    }
?>
