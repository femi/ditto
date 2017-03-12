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
    $route->add("^(\w+)/friendcircles/(\d+)/?$");
    $route->add("^(\w+)/friendcircles/?$");
    $route->add("^(\w+)/messages/(\w+)/?");
    $route->add("^(\w+)/messages/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/messages/messageHome.php");
    });
    $route->add("^comments/create/?$");
    $route->add("^(\w+)/sendUserMessage.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/sendUserMessage.php";
    });
    $route->add("^(\w+)/viewUserReceived.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/viewUserReceived.php";
    });
    $route->add("^(\w+)/sendCircleMessage.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/sendCircleMessage.php";
    });
    $route->add("^(\w+)/viewCircleMessages.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/viewCircleMessages.php";
    });
    // $route->add("^resources/jquery-3.1.1.js", function() {
    //     readfile(dirname($_SERVER['DOCUMENT_ROOT']) . 'resources/jquery-3.1.1.js';
    // });
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
            print_r($_GET['uri']);
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
