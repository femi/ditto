<?php
require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
?>


<div class="container">
  <br><h2 class="title is-2">Circle Name</h2><hr>
  <div class="columns">
    <div class="column is-one-quarter">
      <h4 class="title is-4"><strong>Add member</strong></h4>
        <div class="content">
          Use this area to add your friends to your existing circles.
        </div>
        <p class="control">
          <span class="select">
            <select>
              <option>Friend</option>
              <option>Friend 1</option>
              <option>Friend 2</option>
              <option>Friend 3</option>
            </select>
          </span>
          <span class="select">
            <select>
              <option>Circle</option>
              <option>Friend 1</option>
            </select>
          </span>
        </p>
        <p class="control">
          <a class="button">Add</a><br>
        </p>
    </div>

    <div class="column is-1"></div>

    <div class="column">
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img src="http://bulma.io/images/placeholders/128x128.png">
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <p>
              <a href="/$username"><strong>Full Name</strong></a><br>
              Biography
            </p>
          </div>
        <div id="alltags">
        </div>
        </div>
        <div class="media-right">
          <button class="is-danger delete"></button>
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
              <a href="/$username"><strong>Full Name</strong></a><br>
              Biography
            </p>
          </div>
        <div id="alltags">
        </div>
        </div>
        <div class="media-right">
          <button class="is-danger delete"></button>
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
              <a href="/$username"><strong>Full Name</strong></a><br>
              Biography
            </p>
          </div>
        <div id="alltags">
        </div>
        </div>
        <div class="media-right">
          <button class="is-danger delete"></button>
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
              <a href="/$username"><strong>Full Name</strong></a><br>
              Biography
            </p>
          </div>
        <div id="alltags">
        </div>
        </div>
        <div class="media-right">
          <button class="is-danger delete"></button>
        </div>
      </article>

    </div>
  </div>
</div>
