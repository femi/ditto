<?php
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
    $route->add("^(\w+)/albums/(\d+)/(\w+)/?$");
    $route->add("^(\w+)/albums/(\d+)/?$");
    $route->add("^(\w+)/albums/?$");
    $route->add("^(\w+)/blogs/(\d+)/(\w+)/?$");


      $route->add("permission/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/permissions.php"); 
    });  


// Routes for circles
    $route->add("^(\w+)/circles/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-CRUD.php"); 
    });
    $route->add("^(\w+)/circles/addCircle/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-C.php");
    });
    $route->add("^(\w+)/circles/deleteCircle/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-D.php");
    });
    $route->add("^(\w+)/circles/updateCircle/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-U.php");
    });
    $route->add("^(\w+)/circles/friends/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friends-in-circle.php");
    });
    $route->add("^(\w+)/circles/friends/add/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-add.php");
    });
    $route->add("^(\w+)/circles/friends/remove/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-remove.php");
    });

// Routes for friends
   $route->add("^(\w+)/friends/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/friend-requests.php");
    });
     $route->add("^(\w+)/friends/accept/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/accept-friendrequest.php");
    });
       $route->add("^(\w+)/friends/request/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/make-friendrequest.php");
    });




    $route->add("^(\w+)/messages/(\w+)/?");
    $route->add("^(\w+)/messages/?$", function() {
        echo "hi Femi";
    });
    $route->add("^comments/create/?$");
    $route->add("^(\w+)/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/home/home.php";
    });

    // Temporary routes for testing
    //$route->add('^albums/?$');
    //$route->add('^albums/(\d+)/?$');
    //$route->add('^albums/(\d+)/(\w+)/?$');

    try {
        $route->submit();
    } catch (RouteException $e) {
        if (!isset($_GET['uri'])) {
            // homepage requested
            include "$_SERVER[DOCUMENT_ROOT]/php/home/home.php";
            echo "logged in ";
        } else {
            echo "routeException but logged in:";
            echo "<pre>";
            print_r($_REQUEST);
            print_r($_SESSION);
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
            include "$_SERVER[DOCUMENT_ROOT]/php/home/publicHomepage.php";
            echo "logged out";
        } else {
            // TODO redirect to error page
            echo "Route Exception - logged out";
        }
    }

}

?>
