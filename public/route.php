<?php

class Route {

	private $_uri = array();
	/**
	 * Builds a collection of internal URLs to look for.
	 */
	public function add($uri) {
		$this->_uri[] = $uri;	
	}

	public function submit() {
		$uri_get_param  = isset($_GET['uri']) ? $_GET['uri'] : '/'; // comes from the .htaccess file

		foreach($this->_uri as $key => $value) {
			// look for matches in _uri array
			if (preg_match("#^$value$#", $uri_get_param)) {
				echo "match!";	
				echo $value;
				echo $uri_get_param;
			}
		}
	}
}	

?>
