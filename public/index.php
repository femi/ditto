<?php

session_start(); // import session.
include "$_SERVER[DOCUMENT_ROOT]/php/routing/Route.php";

// Check if user is logged in.
if (isset($_SESSION['userId'])) {
    // User is logged in - create a new Route object
    $route = new Route();

    // Add valid routes for logged in user to whitelist
    $route->add('^logout.php/?$', function() {
        require_once("./php/home/logout.php"); 
    });
    $route->add("^(\w+)/albums/(\d+)/(\w+)/?$");
    $route->add("^(\w+)/albums/(\d+)/?$");
    $route->add("^(\w+)/albums/?$");
    $route->add("^(\w+)/blogs/(\d+)/(\w+)/?$");
    $route->add("^(\w+)/friendcircles/(\d+)/?$");
    $route->add("^(\w+)/friendcircles/?$");
    $route->add("^(\w+)/messages/(\w+)/?");
    $route->add("^(\w+)/messages/?$", function() {
        echo "hi Femi";
    });
    $route->add("^comments/create/?$");
    $route->add("^(\w+)/?$", function() {
        // readfile('./testRoutePage.html'); // readfile for HTML pages
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
            print_r($_SESSION);
        }
    }

} else { // User is logged out
    // define routes you can see while not logged in.
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
            // include './php/home/publicHomepage.php';
            include "$_SERVER[DOCUMENT_ROOT]/php/home/publicHomepage.php";
            echo "logged out";
        } else {
            echo "Route Exception - logged out";
        }
    }

}

?>
