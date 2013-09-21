<?php require 'include/common.php';

// set this in each case (or die)
$redir = 'submit.php';

function die_params() {
	echo 'Bad form parameters. Go back and try again.';
	die();
}

switch (get_get_param('action')) {
case 'delete':
	$id = get_get_param('id');
	$type = get_get_param('type');
	if (empty($table) || empty($id)) {
		die_params();
	}
	switch ($type) {
	case 'account':
		$db->execute('delete_account', $id);
		$redir = 'manage.php?tab=account';
		break;
	
	case 'owner':
		$db->execute('delete_owner', $id);
		$redir = 'manage.php?tab=owner';
		break;
		
	default:
		die_params();
		break;
	}
	
case 'create':
	$type = get_get_param('type');
	if (empty($type)) {
		die_params();
	}
	switch ($type) {
	case 'account':
		$db->execute('delete_account', $id);
		$redir = 'manage.php?tab=account';
		break;
	
	case 'owner':
		$db->execute('delete_owner', $id);
		$redir = 'manage.php?tab=owner';
		break;
		
	default:
		die_params();
		break;
	}

default:
	die_params();
	break;
}

header("Location: $redir");

?>