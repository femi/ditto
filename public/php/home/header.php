<script>

if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}

</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/bulma.css">

<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">


      <a class="nav-item">
        <img src="http://placehold.it/40" alt="logo">
      </a>

      <div class="level-item">
        <p class="control">
          <input class="input" type="text" placeholder="Search">
          <!-- <button class="button"> -->
        </p>
      </div>

      <a href= <?php echo $username . "/friends"?> class="nav-item is-tab is-hidden-mobile">Friends</a>
      <a href= <?php echo $username . "/circles"?> class="nav-item is-tab is-hidden-mobile">Circles</a>
      <a href= <?php echo $username . "/albums"?> class="nav-item is-tab is-hidden-mobile">Albums</a>
      <a href= <?php echo $username . "/messages"?> class="nav-item is-tab is-hidden-mobile">Messages</a>

      <p class="control has-addons"></p>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">

      <a class="nav-item is-tab">
        <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="http://bulma.io/images/jgthms.png">
        </figure>
        Profile
      </a>
      <a href="/logout.php" class="nav-item is-tab">Log out</a>
    </div>
  </div>
</nav>
