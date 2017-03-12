
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/bulma.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="/js/comments.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>


<!-- Fixed Header bar -->
<style> .nav { position: fixed !important; top: 0; left: 0; right: 0; } body { padding-top: 60px; } </style>

<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">

      <a class="nav-item" href="/">

        <img src="http://placehold.it/40" alt="logo">
      </a>

      <div class="nav-item">
        <p class="control">
          <input class="input" type="text" placeholder="Search">
        </p>
      </div>
        <a href= /<?php echo $_SESSION['username'] . "/friends"?> class="nav-item is-tab is-hidden-mobile">Friends</a>
        <a href= /<?php echo $_SESSION['username'] . "/circles"?> class="nav-item is-tab is-hidden-mobile">Circles</a>
        <a href= /<?php echo $_SESSION['username'] . "/albums"?> class="nav-item is-tab is-hidden-mobile">Albums</a>
        <a href= /<?php echo $_SESSION['username'] . "/messages"?> class="nav-item is-tab is-hidden-mobile">Messages</a>
      </div>



    <div class="nav-right nav-menu">

      <a class="nav-item is-tab" href="/settings">Settings</a>
      <a href="/logout.php" class="nav-item is-tab">Log out</a>
    </div>
  </div>
</nav>
