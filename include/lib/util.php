<?php

// contains various utility function

/**
 * Gets the value of an array key, or the default if array key does not exist.
 *
 * @param $arr The array to get the value from.
 * @param $key The key whose value to get.
 * @param $default What to return if the array key does not exist.
 */
function get_key_value($arr, $key, $default) {
	$val = '';
	if (array_key_exists($key, $arr)) {
		$val = $arr[$key];
	} else {
		$val = $default;
	}
	return $val
}

?>
