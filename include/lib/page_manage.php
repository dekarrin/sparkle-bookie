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
	$tab = get_get_param('tab', 'home');
	switch ($tab) {
	case 'home':
	case 'account':
	case 'owner':
		return array(
			'tab' => get_get_param('tab', 'home'),
			'section' => get_section_header_text();
			'intro' => get_section_intro_text();
			'has_items' => 
		);
		break;
	}
}
?>
