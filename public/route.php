<?php

class Route {
    private $_uri = Array(); 
    private $_method = Array();

    public function add($uri, $method = null) {
        $this->_uri[] = trim($uri, '/');    
        $this->_method[] = $method;
    }

    public function submit() {
        $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] : '/403';

        //echo "<pre>";
        //print_r($this->_uri);
        //print_r($this->_method);
        foreach($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $uriGetParam)) {
                // echo "match: ";
                // echo "value: " . $value;
                // echo "uriGetParam: " . $uriGetParam;
                // echo "key: " . $key;

                // $useMethod = $this->_method[$key];
                // new $useMethod();
                call_user_func($this->_method[$key]);
                break;
            }
        }

    }

}

?>
