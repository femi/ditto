<?php
  require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
?>

<div class="container">
  <br><h2 class="title is-2">Messages</h2><hr>
  <div class="columns">

  <div class="column is-one-quarter">
    <h4 class="title is-4"><strong>Select message circle</strong></h4>
    <div class="content">
      Select a circle that you would like to measage
    </div>
    <p class="control">
      <span class="select is-medium">
        <select>
          <option>Select dropdown</option>
          <option>With options</option>
        </select>
      </span>
    </p><br><br>

    <h5 class="title is-5"><strong>Send message</strong></h5>
    <p class="control">
      <textarea class="textarea " placeholder="Write you message here :)"></textarea>
    </p>
    <p class="control">
      <a class="button is-primary is-medium">Send</a>
    </p>
  </div>

  <div class="column is-1"></div>

  <div class="column">
  <h4 class="title is-4"><strong>{thread name}</strong></h4>
    <div class="notification">
      <article class="media">
        <div class="media-content">
          <div class="content">
            <p>
              <strong>Sarah Jones</strong> <small>@sarah</small> <small>31m</small>
              <br>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
            </p>
          </div>
        </div>
      </article>
    </div>
    <div class="notification is-info">
      <article class="media">
        <div class="media-content">
          <div class="content">
            <p>
              <strong>Robert Jones</strong> <small>@robert</small> <small>31m</small>
              <br>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
            </p>
          </div>
        </div>
      </article>
    </div>
    <div class="notification">
      <article class="media">
        <div class="media-content">
          <div class="content">
            <p>
              <strong>Longley Bassey</strong> <small>@longley</small> <small>31m</small>
              <br>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
            </p>
          </div>
        </div>
      </article>
    </div>
  </div>

</div>

</div>
</div>
