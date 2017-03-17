<?php

require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidUser.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidUsername.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/userIdHasUsername.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidAlbum.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidPhoto.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/isValidTag.php");

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
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // import session.
}
include "$_SERVER[DOCUMENT_ROOT]/php/routing/Route.php";


// Check if user is logged in.
if (isset($_SESSION['userId'])) {
    // User is logged in - create a new Route object
    $route = new Route();

// Routes for blogs

    $route->add("^404/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/error/404.html");
    });
    $route->add("^403/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/error/403.html");
    });
    // $route->add("^backend-search.php/?$", function() {
    //     require_once("$_SERVER[DOCUMENT_ROOT]/php/home/backend-search.php");
    // });
    $route->add("^backend-search-blogs.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/backend-search-blogs.php");
    });
    $route->add("^delete_comment.php/?$", function() {
        if ($userOwnsComment($_SESSION['userId'], $_POST['commentId'])) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/blogs/delete_comment.php");
        }
    });
    $route->add("^add_comment.php/?$", function() {
        if ($_SESSION['userId'] == $_POST['userId'] && userCanViewBlog($_SESSION['userId'], $_POST['blogId'])) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/blogs/add_comment.php");
        }
    });
    $route->add("^delete_blog.php/?$", function() {
        if (userOwnsBlog($_SESSION['userId'], $_POST['blogId'])) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/blogs/delete_blog.php");
        }
    });
    $route->add("^add_blog.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/blogs/userbloginsert.php");
    });
// album routes
    $route->add("^(\w+)/albums/(\d+)/(.+)/delete/?$", function() {
        // Deletes the photo
        $pathArray = explode('/', $_GET['uri']);
        // check that path is valid
        if (isValidUsername($pathArray[0]) === true && isValidAlbum($pathArray[2]) === true && isValidPhoto($pathArray[3]) === true) {
            // check that user owns their photo
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/delete_photo.php");
                delete_photo($pathArray[0], $_SESSION['userId'], $pathArray[2], $pathArray[3]);
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }

    });
    $route->add("^(\w+)/albums/(\d+)/(.+)/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri'])); // TODO ensure filenames do not have / in them and sort out final slash

        // check validity of path
        if (isValidUsername($pathArray[0]) && isValidAlbum($pathArray[2]) && isValidPhoto($pathArray[3])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0]))  {
                // User is visiting their own page
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_page_with_comments.php");
                get_photo_page_with_comments($pathArray[0], $pathArray[2], $pathArray[3]);
            } else if (userCanViewProfile($pathArray[0]) && userCanViewAlbum($pathArray[2])) {
                // User is not visiting their own page";
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_page_with_comments_nonowner.php");
                get_photo_page_with_comments_nonowner($pathArray[0], $pathArray[2], $pathArray[3]);
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/albums/(\d+)/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri']));

        // Check that the path is valid
        if (isValidUsername($pathArray[0]) && isValidAlbum($pathArray[2])) { // TODO check that user is allowed  to view album
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/non_ajax_get_album_photos.php");
                non_ajax_get_album_photos($pathArray[2], $pathArray[0]);
            } else if (userCanViewProfile($pathArray[0]) && userCanViewAlbum($pathArray[2])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/non_ajax_get_album_photos_nonowner.php");
                non_ajax_get_album_photos_nonowner($pathArray[2], $pathArray[0]);
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/albums/?$", function() {
        // Breakdown the path
        $pathArray = (explode('/', $_GET['uri']));

        // Check that the given username is valid
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                // readfile('./html/albums.html');
                require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/retrieve_user_albums.php");
                retrieve_user_albums($_SESSION['userId'], $pathArray[0]);
                // new_retrieve_user_albums.php($userId);
            } else if (userCanViewProfile($pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/albums/retrieve_user_albums_nonowner.php");
                retrieve_user_albums_nonowner($pathArray[0]);
                // show all albums for which the session user is part of the username's friend circles.
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
        // check if the session user has the same username
    });
    $route->add("^(\w+)/php/photos/get_album_photos.php/?$", function () {
        $pathArray = explode('/', $_GET['uri']);
        // AJAX functions API request
        if ($isValidUsername($_GET['username'])) {
            if (userIdHasUsername($_SESSION['userId'], $_GET['username']) OR (userCanViewProfile($_GET['username'] && userCanViewAlbum($_GET['albumId'])))) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_album_photos.php");
            }
        }
    });
    $route->add("^(\w+)/php/photos/update_photo_caption.php/?$", function () {
        if (userHasPhoto($_SESSION['userId'], $_GET['filename'])) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/update_photo_caption.php");
        }
    });
    $route->add("^(\w+)/php/photos/get_photo_caption.php/?$", function () {
        if (isValidFilename($_GET['filename']) && userCanViewProfile($_SESSION['username']) && userCanViewAlbum(getAlbumFromFilename($_GET['filename']))) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_photo_caption.php");
        }
    });
    $route->add("^(\w+)/php/photos/upload_photo.php/?$", function() {
        // TODO privacy
        echo "Hi";
    });
    $route->add("^(\w+)/php/albums/create_album.php/?$", function() {
        // access check not required
        require_once "$_SERVER[DOCUMENT_ROOT]/php/albums/create_album.php";
    });
    $route->add("^(\w+)/php/albums/changeAlbumPrivacy.php/?$", function() {
        if (isValidAlbum($_GET['albumId']) && userHasAlbum($_SESSION['userId'], $_GET['albumId'])) {
            require_once"$_SERVER[DOCUMENT_ROOT]/php/albums/changeAlbumPrivacy.php";
        }
    });
    $route->add("^(\w+)/php/albums/getAlbumFriendCircles.php/?$", function() {
        if (isValidAlbum($_GET['albumId'])) {
            require_once"$_SERVER[DOCUMENT_ROOT]/php/albums/getAlbumFriendCircles.php";
        }
    });
    $route->add("^(\w+)/php/albums/addAlbumFriendCircle.php/?$", function() {
        if (isValidAlbum($_GET['albumId']) && userHasAlbum($_SESSION['userId'], $_GET['albumId'])) {
            require_once"$_SERVER[DOCUMENT_ROOT]/php/albums/addAlbumFriendCircle.php";
        }
    });
    $route->add("^(\w+)/php/albums/deleteAlbumFriendCircle.php/?$", function() {
        if (isValidCircle($_GET['circleId']) && userHasCircle($_SESSION['userId'], $_GET['circleId'])) {
            require_once"$_SERVER[DOCUMENT_ROOT]/php/albums/deleteAlbumFriendCircle.php";
        }
    });
    $route->add("^(\w+)/php/comments/submitPhotoComment.php/?$", function() {
        if (isValidAlbum($_GET['albumId']) && (userHasAlbum($_SESSION['userId'], $_GET['albumId']) OR (userCanViewProfile($_SESSION['userId']) && userCanViewAlbum($_SESSION['userId'])))) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/comments/submitPhotoComment.php");
        }
    });
    $route->add("^(\w+)/php/comments/getPhotoComments.php/?$", function() {
        if (isValidAlbum($_GET['albumId']) && (userHasAlbum($_SESSION['userId'], $_GET['albumId']) OR (userCanViewProfile($_SESSION['userId']) && userCanViewAlbum($_SESSION['userId'])))) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/comments/getPhotoComments.php");
        }
    });


// Routes for settings
    $route->add("^logout.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/logout.php");
    });
    $route->add("^update_privacy.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/update_privacy.php");
    });
    $route->add("^settings/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/settings.php");
    });
    $route->add("^validate.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/validate.php");
    });
    $route->add("permission/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");
    });

// Routes for mutual friends
    $route->add("mutual/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual-friend-list.php");
    });


// Routes for circles
    $route->add("^(\w+)/circles/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-CRUD.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/(\d+)/", function() {
        $pathArray = (explode('/', $_GET['uri']));
        if (isValidUsername($pathArray[0]) && isValidCircle($pathArray[2])) {
            if (userHasCircle($_SESSION['userId'], $pathArray[2])) {
                $_SESSION['circleId'] = $pathArray[2];
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/individual_circle.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/addFriend/?$", function() {
        $pathArray = (explode('/', $_GET['uri']));
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-add.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/addCircle/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-C.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/deleteCircle/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-D.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/updateCircle/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-U.php");
            } else {
                header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/friends/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friends-in-circle.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });

    $route->add("^(\w+)/circles/friends/add/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-add.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/circles/friends/remove/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-remove.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });

// Routes for friends
   $route->add("^(\w+)/friends/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/friends_layout.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
        // old friends functionality here if you need it for debug
        // require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/friend-requests.php");
    });
    $route->add("^(\w+)/friends/all/?$", function() {
         require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/all-friends.php");
    });
    $route->add("^(\w+)/friends/accept/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/accept-friendrequest.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/friends/request/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/make-friendrequest.php");
            } else {
            header('Location: /403');
            }
        } else {
            print_r($_GET['uri']);
            // // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^php/friends/make-friendrequest.php", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/make-friendrequest.php");
            } else {
            header('Location: /403');
            }
        } else {

            print_r($_GET['uri']);
            // // header('Location: /404');
            print_r($_GET['uri']);
        }
    });

// Routes for messages
    $route->add("^(\w+)/messages/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                // require_once("$_SERVER[DOCUMENT_ROOT]/php/messages/messageHome.php");
                require_once("$_SERVER[DOCUMENT_ROOT]/php/messages/messages_layout.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/sendUserMessage.php/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once "$_SERVER[DOCUMENT_ROOT]/php/messages/sendUserMessage.php";
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }

    });
    $route->add("^(\w+)/viewUserReceived.php/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once "$_SERVER[DOCUMENT_ROOT]/php/messages/viewUserReceived.php";
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/sendCircleMessage.php/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once "$_SERVER[DOCUMENT_ROOT]/php/messages/sendCircleMessage.php";
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }

    });
    $route->add("^(\w+)/viewCircleMessages.php/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once "$_SERVER[DOCUMENT_ROOT]/php/messages/viewCircleMessages.php";
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/messageSingleUserSearch.php/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once "$_SERVER[DOCUMENT_ROOT]/php/messages/messageSingleUserSearch.php";
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });

// Routes for tags
    $route->add("^(\w+)/friends/recommendations/?$", function() {
        $pathArray = explode('/', $_GET['uri']);
        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                require_once("$_SERVER[DOCUMENT_ROOT]/php/tags/recommendByTags.php");
                recommendByTags($_SESSION['userId'], 2);
            } else {
                header('Location: /403');
            } 
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
                
    });
    $route->add("tags/(\w+)/?", function() {
        $pathArray = explode('/', $_GET['uri']);
        $tag = $pathArray[1]; //
        if (isValidTag($tag)) {
            require_once("$_SERVER[DOCUMENT_ROOT]/php/tags/viewTagUsers.php");
            displayAllResults($pathArray[1]);
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });
    $route->add("^(\w+)/messageSingleUserSearch.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/messageSingleUserSearch.php";
    });
    $route->add("^(\w+)/messageCircleSearch.php/?$", function() {
        include "$_SERVER[DOCUMENT_ROOT]/php/messages/messageCircleSearch.php";
    });


// Routes for profile

    $route->add("^(\w+)/?$", function() {
        $pathArray = explode('/', $_GET['uri']);

        if (isValidUsername($pathArray[0])) {
            if (userIdHasUsername($_SESSION['userId'], $pathArray[0])) {
                // user is viewing their own page
                require_once("$_SERVER[DOCUMENT_ROOT]/php/home/home.php");
            } else if (userCanViewProfile($pathArray[0])){
                require_once("$_SERVER[DOCUMENT_ROOT]/php/home/profile.php");
            } else {
            header('Location: /403');
            }
        } else {
            // header('Location: /404');
            print_r($_GET['uri']);
        }
    });

    try {
        $route->submit();
    } catch (RouteException $e) {
        if (!isset($_GET['uri'])) {
            // homepage requested
            require_once "$_SERVER[DOCUMENT_ROOT]/php/home/home.php";
        } else {
            // echo "routeException but logged in:";
            print_r($_GET['uri']);
            // header('Location: /404');
        }
    }

} // end big if statement for user is logged in

else {
    // User is logged out
    // define API routes you can see while not logged in.
    $public_route = new Route();

    $public_route->add("^404/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/error/404.html");
    });
    $public_route->add("^403/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/error/403.html");
    });

    $public_route->add("^register/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/register.php");
    });
    $public_route->add("^register_controller.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/register_controller.php");
    });

    $public_route->add("^login/?$", function() {
        //require_once("$_SERVER[DOCUMENT_ROOT]/index.php");
    });
    $public_route->add("^login.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/login.php");
    });
    $public_route->add("^validate.php/?$", function() {
        require_once("$_SERVER[DOCUMENT_ROOT]/php/home/validate.php");
    });

    try {
        $public_route->submit();
    } catch(RouteException $e) {
        if (!isset($_GET['uri'])) {
            // homepage requested
            require_once "$_SERVER[DOCUMENT_ROOT]/php/home/publicHomepage.php";
        } else {
            // TODO redirect to error page
            //echo "Route Exception - logged out";
            header('Location: /404');
        }
    }
}
?>
