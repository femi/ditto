<?php

require("$_SERVER[DOCUMENT_ROOT]/php/routing/routeException.php");

/**
 * Class that holds maps of regular expressions and methods, and calls them when a given GET uri is matched.
 */
class Route {
    private $_uri = Array(); 
    private $_method = Array();

    /**
     *  Adds a given regular expression and method to the _uri and _method arrays.
     */
    public function add($uri, $method = null) {
        $this->_uri[] = trim($uri, '/');    
        $this->_method[] = $method;
    }

    /**
     * Called after adding all the URL routes, iterates through the urls, comparing what is received by the GET
     * request with each regular expression in the _uri array.  If there is a match and a method was given, it calls 
     * the method. If no match was found, it throws a custommade RouteException.
     */
    public function submit() {
        $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] : '/403';
        $found = false;
        foreach($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $uriGetParam) && $this->_method[$key] != null) {
                call_user_func($this->_method[$key]);
                $found = true;
                break;
            }
        }

        if ($found === false) {
            throw new RouteException('');
        }
    }

}

?>
