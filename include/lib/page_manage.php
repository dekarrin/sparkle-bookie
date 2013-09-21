<?php
// Contains functions specific to manage.php

function get_section_display_class($section) {
	$tab = get_get_param('tab', 'home');
	if ($tab == $section) {
		return 'active';
	} else {
		return 'inactive';
	}
}

function get_page_variables() {
	global $db;
	$tab = get_get_param('tab', 'home');
	$page_vars = array(
		'tab' => $tab,
		'item_type' => '',
		'section' => '',
		'intro' => '',
		'has_items' => false;
	);
	switch ($tab) {
	case 'home':
		$page_vars['intro'] = 'Select one of the categories to manage the items in it.';
		break;
		
	case 'account':
		$page_vars['item_type'] = 'account';
		$page_vars['item_type_plural'] = 'accounts';
		$page_vars['section'] = 'Account ';
		$page_vars['intro'] = 'Manage accounts that transactions may be posted to.';
		$page_vars['items'] = get_all_accounts();
		$page_vars['has_items'] = (count($page_vars['items']) > 0);
		break;
		
	case 'owner':
		$page_vars['item_type'] = 'owner';
		$page_vars['item_type_plural'] = 'owners';
		$page_vars['section'] = 'Owner ';
		$page_vars['intro'] = 'Manage the owners of accounts.';
		$page_vars['items'] = get_all_owners();
		$page_vars['has_items'] = (count($page_vars['items']) > 0);
		break;
	}
	return $page_vars;
}
?>
