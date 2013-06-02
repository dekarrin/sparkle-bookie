<?php
// Contains functions for processesing form input

require_once 'include/lib/util.php';


/**
 * Gets a GET parameter, or a default value if the get param does not exist.
 */
function get_get_param($name, $default = '') {
	return get_key_value($_GET, $name, $default);
}

/**
 * Gets a POST parameter, or a defualt value if the post param does not exist.
 */
function get_post_param($name, $default = '') {
	return get_key_value($_POST, $name, $default);
}

?>
