<?php 

    /**
     * Create a custom Route Exception, in which it is mandatory to give a message.
     */
    class RouteException extends Exception {
    
        /**
         * Call the parent constructor.
         */
        public function __construct($message, $code = 0, Exception $previous = null) {
            parent ::__construct($message, $code, $previous);
        }

    }

?>
