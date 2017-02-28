<?php

session_start(); // import session.
include 'route.php';

if (isset($_SESSION['userId'])) {
    echo "LOGIN USER SET";

    // creates a new Route object
    $route = new Route();

    // Add valid routes to whitelist
    $route->add('^(\w+)/albums/(\d+)/(\w+)/?$');
    $route->add('^(\w+)/albums/(\d+)/?$');
    $route->add('^(\w+)/albums/?$', function() {
        include './mabs.php';
        test();
    });
    $route->add('^(\w+)/blogs/(\d+)/(\w+)/?$');
    $route->add('^(\w+)/friendcircles/(\d+)/?$');
    $route->add('^(\w+)/friendcircles/?$');
    $route->add('^(\w+)/messages/(\w+)/?');
    $route->add('^(\w+)/messages/?$');
    $route->add('^comments/create/?$');
    $route->add('^(\w+)/?$', function() {
        readfile('./testRoutePage.html');
    });

    // Temporary routes for testing
    //$route->add('^albums/?$');
    //$route->add('^albums/(\d+)/?$');
    //$route->add('^albums/(\d+)/(\w+)/?$');

    $route->submit();

} else {
    print_r($_SESSION); // TODO delete before production
    echo "Fuck off, Kevin. Ya kunt";
}


?>
