<?php include "$_SERVER[DOCUMENT_ROOT]/php/blogs/userblogs.php";

if (isset($_POST['comment']) && isset($_POST['submit'] )) {
  $comment = addslashes($_POST['comment']);
  $blogId = $_POST['blogId'];
  db_query("INSERT INTO comments (message, userId, blogId) VALUES ('$comment', '$userId', $blogId)");
}

$usersblogs = retrieve_blog_content(db_quote($userId));

while ( $row = $usersblogs->fetch_assoc()){

  $blogId = $row['blogId'];
  $fullname = $user_data['fName'] . " " . $user_data['lName'];
  $uname = $user_data['username'];
  $blogcontent = $row['content'];
  $blog_user = $row['userId'];

    echo "<article id=\"b_$blogId\" class=\"media\">
      <figure class=\"media-left\">
        <p class=\"image is-32x32\">
          <img class=\"img-rounded\" src=\"https://s-media-cache-ak0.pinimg.com/736x/de/28/7a/de287a2e93bbe57ef5d1ec0e77c8c6a0.jpg\">
        </p>
      </figure>

      <div class=\"media-content\">
        <div class=\"content\">
          <p>
            <strong> $fullname </strong> <small> @$uname </small><br>
          </p>
          $blogcontent <br>
          "
          ;

      viewComments($row['blogId']);

      echo "
        </div>

        <nav class=\"level\">
          <div class=\"level-item\">
          <div class=\"media-content\">
          <form action\"\" method=\"POST\" id=\"$blogId\">
            <div class=\"control is-grouped\">
            <figure class=\"media-left\">
            </figure>
              <p class=\"control is-expanded\">
                <input id=\"comment\" class=\"input\" type=\"text\" name=\"comment\" placeholder=\"What do you have to say $firstname?\" required>
                <input type=\"hidden\" name=\"blogId\" value=\"$blogId\"/>
              </p>
              <p class=\"control\">
                <input class=\"button is-primary\" type=\"submit\" style=\"display: none;\" name=\"submit\" onclick=\"addComment($blogId, $blog_user, document.getElementById('comment').value)\" >
              </p>
            </div>
          </form>
          </div>
          </div>
        </nav>
      </div>
      <div class=\"media-right\">
        <button class=\"delete\" onclick=\"deleteBlog($blogId)\"></button>
      </div>
    </article>
  ";
  }

function viewComments($blogId) {

    $query = "SELECT * FROM `comments` WHERE `blogId` = '$blogId'";
    $result = db_query($query);

    while ($comment = $result->fetch_assoc()) {
      $content = $comment['message'];
      $userId = $comment['userId'];
      $postTime = $comment['createdAt'];
      $commentId = $comment['commentId'];

      // get the user details of the comment poster
      $bloguser = getUser($userId);
      $fName = $bloguser['fName'];
      $lName = $bloguser['lName'];
      $user = $bloguser['username'];

      $comments_html ="
      <article id=\"c_$commentId\" class=\"media\">
        <figure class=\"media-left\">
        </figure>
        <div class=\"media-content\">
          <div class=\"content\">
            <p>
              <a href=\"/$user\">$fName $lName </a><small>  @$user  </small> <small>$postTime</small><br>
                $content
            </p>
          </div>
        </div>
        <a class=\"delete is-small\" onclick=\"deleteComment($commentId);\"></a>

        </article>
        ";
      echo $comments_html;
    }
}

function getUser($id) {
  $result = db_query("SELECT * FROM `users` WHERE `userId` = '$id'");
  return $result->fetch_assoc();
}
?>
