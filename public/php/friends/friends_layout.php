<?php
  require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
?>


<div class="container">
  <br><h2 class="title is-2">Friends</h2><hr>

    <div class="columns">
      <div class="column is-one-quarter">
        <h4 class="title is-4"><strong>Friends</strong></h4>
        <div class="content">
          You can view all of your friends here, you have so many.
          <br><br><a href="#">View all friends</a>
        </div>
        <h4 class="title is-4"><strong>People who you may know</strong></h4>
          <div class="content">
            You can view friend recomnendations using our black box algorithm.
            <br><br><a href="#">View recommendations</a>
          </div>
        <h4 class="title is-4"><strong>Requests</strong></h4>
        <article class="media">
          <figure class="media-left">
            <p class="image is-24x24">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>Full Name</strong>
              </p>
            </div>
          </div>
          <div class="media-right">
            <a class="button is-small is-success is-outlined">Accept</a>
            <a class="button is-small is-danger is-outlined">Reject</a>
          </div>
        </article>
        <article class="media">
          <figure class="media-left">
            <p class="image is-24x24">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>Full Name</strong>
              </p>
            </div>
          </div>
          <div class="media-right">
            <a class="button is-small is-success is-outlined">Accept</a>
            <a class="button is-small is-danger is-outlined">Reject</a>
          </div>
        </article><br>
      </div>
      <div class="column is-1"></div>
      <div class="column">
        <h4 class="title is-4"><strong>Search</strong></h4>
        <p class="control has-addons">
          <input class="input is-expanded is-medium" type="text" placeholder="Search for friends">
          </a>
        </p>




        <label class="switch">
          <input type="checkbox">
          <div class="slider round"></div>
        </label>


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
      </div>
    </div>
</div>
