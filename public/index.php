<?php

require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidUser.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidUsername.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/userIdHasUsername.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidAlbum.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidPhoto.php");

/**
 * Apache redirects every server request to this file. 
 * Essentially, it checks the request against a list of regular expressions, 
 * and calls an associate anonmous function, if it exists. If no match is found, the Route submit function
 * throws a RouteException which can be caught and redirected to a 404 or 403 as appropriate.
 *
 * The routes for logged in users are kept entirely separate from the public routes.
 * A route is added like this: $route->add(regular expression, anonymous function); where $route is an instance of the Route class.
 * The anonymous function can call a php function, include a php file, or readfile (for html pages).
 */

session_start(); // import session.
include "$_SERVER[DOCUMENT_ROOT]/php/routing/Route.php";

// Check if user is logged in.
if (isset($_SESSION['userId'])) {
    // User is logged in - create a new Route object
    $route = new Route();

    // Add valid routes for logged in user to whitelist
    $route->add("^logout.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/logout.php"); 
    });
    $route->add("^(\w+)/albums/(\d+)/(.+)/delete/?$", function() {
        // Deletes the photo
        $pathArray = explode('/', $_GET['uri']);
        // check that path is valid
        if (isValidUsername($pathArray[0]) === true && isValidAlbum($pathArray[2]) === true && isValidPhoto($pathArray[3]) === true) {
            echo "Valid username, album, and photo given";
            // check that user owns their photo
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                echo "User is visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/delete_photo.php");
                delete_photo($pathArray[0], $_SESSION['userId'], $pathArray[2], $pathArray[3]);
            }
        }

    });
    $route->add("^(\w+)/albums/(\d+)/(.+)/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri'])); // TODO ensure filenames do not have / in them and sort out final slash

        // check validity of path
        if (isValidUsername($pathArray[0]) && isValidAlbum($pathArray[2]) && isValidPhoto($pathArray[3])) {
            echo "Valid username, album, and photo given";

            if (userIdHasUsername($_SESSION['userId'], $pathArray[0]))  {
                echo "<br />";
                echo "User is visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_page_with_comments.php");
                get_photo_page_with_comments($pathArray[0], $pathArray[2], $pathArray[3]);
            } else {
                echo "<br />";
                echo "User is not visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_page_with_comments_nonowner.php");
                get_photo_page_with_comments_nonowner($pathArray[0], $pathArray[2], $pathArray[3]);
            }
        } else {
            echo "Invalid"; // TODO redirect to error
        }
    });
    $route->add("^(\w+)/albums/(\d+)/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri']));

        // Check that the path is valid
        if (isValidUsername($pathArray[0]) && isValidAlbum($pathArray[2])) { // TODO check that user is allowed  to view album
            echo "Valid username and album given";
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                echo "<br />";
                echo "User is visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/non_ajax_get_album_photos.php");
                non_ajax_get_album_photos($pathArray[2], $pathArray[0]);
            } else {
                echo "<br />";
                echo "User is not visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/non_ajax_get_album_photos_nonowner.php");
                non_ajax_get_album_photos_nonowner($pathArray[2], $pathArray[0]);
            }
        } else {
            echo "Invalid path given"; // TODO redirect to 404
        }
    });
    $route->add("^(\w+)/albums/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri']));

        // Check that the given username is valid
        if (isValidUsername($pathArray[0])) {
            echo "Valid username given";
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                echo "<br />";
                echo "User is visiting their own page";
                // readfile('./html/albums.html');
                require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/retrieve_user_albums.php");
                retrieve_user_albums($_SESSION['userId'], $pathArray[0]);
                // new_retrieve_user_albums.php($userId);
            } else {
                echo "<br />";
                echo "User is not visiting their own page";
                echo "Need to create an edited retrieve_user_albums that checks album privacy settings and does not offer create album";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/retrieve_user_albums_nonowner.php");
                retrieve_user_albums_nonowner($_SESSION['userId'], $pathArray[0]);
                // show all albums for which the session user is part of the username's friend circles.
            }
        } else {
            echo "<br />";
            echo "Invalid username given"; 
        }
        // check if the session user has the same username
    });
    $route->add("^(\w+)/blogs/(\d+)/(\w+)/?$");
    $route->add("^(\w+)/friendcircles/(\d+)/?$");
    $route->add("^(\w+)/friendcircles/?$");
    $route->add("^(\w+)/messages/(\w+)/?");
    $route->add("^(\w+)/messages/?$", function() {
        echo "hi Femi";
    });
    $route->add("^comments/create/?$");
    $route->add("^(\w+)/php/photos/get_album_photos.php/?$", function () {
        // temporary hack I hope...
        require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_album_photos.php");
    });
    $route->add("^(\w+)/php/photos/update_photo_caption.php/?$", function () {
        // temporary hack I hope
        $pathArray = (explode('/', $_GET['uri']));
        require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/update_photo_caption.php");

    });
    $route->add("^(\w+)/php/photos/get_photo_caption.php/?$", function () {
        // temporary hack I hope
        require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_caption.php");
    });
    $route->add("^(\w+)/php/albums/create_album.php/?$", function() {
        // Called by the create album AJAX request
        include "$_SERVER[DOCUMENT_ROOT]/php/albums/create_album.php";
    });
    $route->add("^(\w+)/php/photos/upload_photo.php/?$", function() {
        echo "Hi";
    });
    $route->add("^(\w+)/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/home/home.php";
    });

    try {
        $route->submit();
    } catch (RouteException $e) {
        if (!isset($_GET['uri'])) {
            // homepage requested
            include "$_SERVER[DOCUMENT_ROOT]/php/home/home.php";
            echo "logged in ";
        } else {
            echo "routeException but logged in:";
            $pathArray = (explode('/', $_GET['uri']));
        }
    }

} else { 
    // User is logged out
    // define API routes you can see while not logged in.
    $public_route = new Route();

    $public_route->add("^register/?$", function() {
        include("$_SERVER[DOCUMENT_ROOT]/php/home/register.php");
    });
    $public_route->add("^register_controller.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/register_controller.php");
    });

    $public_route->add("^login/?$", function() {
        //include("$_SERVER[DOCUMENT_ROOT]/index.php");
    });
    $public_route->add("^login.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/login.php");
    });

    try {
        $public_route->submit();
    } catch(RouteException $e) {
        if (!isset($_GET['uri'])) {
            // homepage requested
            echo "logged out";
            include "$_SERVER[DOCUMENT_ROOT]/php/home/publicHomepage.php";
        } else {
            // TODO redirect to error page
            echo "Route Exception - logged out";
        }
    }
}

?>
