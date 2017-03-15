<?php
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
          <p class="control">
            <input class="input" type="text" placeholder="Circle name e.g. Friends">
          <p class="control">
            <a class="button">Create</a><br>
          </p>
        </p><hr>
      </div>
      <div class="column is-1"></div>
      <div class="column">
        <h4 class="title is-4"><strong>Your Circles</strong></h4>
        <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <a href="/$username"><strong>Circle Name</strong></a><br>
                Amount of users?
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-danger is-outlined">Delete</button>
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
                <a href="/$username"><strong>Circle Name</strong></a><br>
                Amount of users?
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-danger is-outlined">Delete</button>
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
                <a href="/$username"><strong>Circle Name</strong></a><br>
                Amount of users?
              </p>
            </div>
          <div id="alltags">
          </div>
          </div>
          <div class="media-right">
            <button class="button is-danger is-outlined">Delete</button>
          </div>
        </article>
      </div>
    </div>
</div>
