<?php
# Core functions used by the system

function get_all_owners() {
	global $db;
	$users = $db->prepared_select('get_all_owners');
	return $users;
}

function get_all_accounts() {
	global $db;
	$accounts = $db->prepared_select('get_all_accounts');
	return $accounts;
}

function get_owner_count() {
	global $db;
	return $db->prepared_get('get_owner_count');
}

function get_account_count() {
	global $db;
	return $db->prepared_get('get_account_count');
}
?>
