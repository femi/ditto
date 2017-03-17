<?php
  require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
  require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/get-all-users.php");
?>


<script src="/js/searchfof.js"></script>
<script src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/sendFriendRequest.js"></script>


<div class="container">
  <br><h2 class="title is-2">Friends</h2><hr>

    <div class="columns">
      <div class="column is-one-quarter">
        <h4 class="title is-4"><strong>Friends</strong></h4>
        <div class="content">
          You can view all of your friends here, you have so many.
          <br><br><a href="friends/all">View all friends</a>
      </div>
        <h4 class="title is-4"><strong>People who you may know</strong></h4>
          <div class="content">
            You can view friend recomnendations using our black box algorithm.
            <br><br><a href="friends/recommendations">View recommendations</a>
          </div>
        <h4 class="title is-4"><strong>Requests</strong></h4>
        <?php  get_incomingFrequests() ?><br>
      </div>
      <div class="column is-1"></div>
      <div class="column">
        <h4 class="title is-4"><strong>Search</strong></h4>

        <!-- Search box for friends of friends -->
        <p class="control has-addons">
          <input id="fofsearch" class="input is-expanded is-medium" type="text" placeholder="Search for friends of friends">
          </a>
        </p>

        <!-- The result of the search -->
        <div id="fofresult"> </div>

        <!-- <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <a href="/$username"><strong>Full Name</strong></a><br><small>Location</small><br>
                Biography goes here
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-info">Add Friend</button>
          </div>
        </article>



        <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <a href="/$username"><strong>Full Name</strong></a><br><small>Location</small><br>
                Biography goes here
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-info">Add Friend</button>
          </div>
        </article>


        <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <a href="/$username"><strong>Full Name</strong></a><br><small>Location</small><br>
                Biography goes here
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-info">Add Friend</button>
          </div>
        </article> -->
      </div>
    </div>
</div>

<script>
    $(document).ready(setupFofSearch());

</script>
