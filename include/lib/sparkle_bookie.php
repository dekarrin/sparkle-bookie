<?php
# Core functions used by the system

function get_all_users() {
	global $db;
	$users = $db->prepared_select('get_all_users');
	return $users;
}

function get_all_categories() {
	global $db;
	$cats = $db->prepared_select('get_all_categories');
	return $cats;
}
?>
